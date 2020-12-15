<?php

namespace App\Http\Controllers;

use App\Account;
use App\Category;
use App\Exports\AccountsExport;
use App\Folder;
use App\Http\Requests\AccountStoreForm;
use App\Http\Requests\AccountUpdateForm;
use App\Mail\AccountsExportedNotificationEmail;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Excel;
use PragmaRX\Google2FA\Google2FA;
use TechTailor\RPG\Facade\RPG;

class AccountsController extends Controller
{
	private $excel;

	/* 
	 * Return only Open Accounts 
	 * Accounts not added to any password protected folder.
	 *
	 */
	protected function getOpenAccounts($get_accounts)
	{	
		$a = null;

        foreach($get_accounts as $account)
        {
            if($account->folder->isEmpty())
                $a[] = $account;
            else
            {
                if($account->folder[0]->password == null)
                    $a[] = $account;
            }
        }

		$accounts = collect($a);

		return $accounts;
	}

    /**
     * Adding auth & 2FA middleware to this controller.
     *
     */
    public function __construct(Excel $excel)
	{
		$this->middleware(['auth','verified','2fa']);
		$this->excel = $excel;
	}

	/* Displaying the accounts page */
	public function index()
	{
        $get_accounts = Account::where('user_id',Auth::user()->id)->get();

		$accounts = $this->getOpenAccounts($get_accounts);

		$categories = Category::where('active',1)->get();

		$folders = Folder::where('user_id',Auth::user()->id)->get();

		return view('ui.accounts.index')->with(compact('categories','accounts','folders'));
	}

	/**
     * Display the list of accounts matching the searched parameters
     */
    public function search(Request $request)
    {
        $auth_id = Auth::user()->id; //Extracting user id.

        $search = $request->input('search', '');

        $get_accounts = Account::SearchByKeyword($search)->where('user_id' ,Auth::user()->id)->get();

		$accounts = $this->getOpenAccounts($get_accounts);

		$folders = Folder::where('user_id',Auth::user()->id)->get();

        /* Retrive all categories */
        $categories = Category::where('active',1)->get();

        return view('ui.accounts.index')->with(compact('accounts','categories','folders'));
    }

	/* 
	 * Store a newly created account into vault 
	 */
	public function store(AccountStoreForm $request)
	{
		$account = new Account($request->all());

		//Code to check and add http to link if it doesnt exists.
        if (!preg_match("~^(?:f|ht)tps?://~i", $account->link)) {
        	$account->link = "http://" . $account->link;
        } 

        Auth::user()->accounts()->save($account);

        return redirect('accounts')->with('success', 'Account Added Successfully');
	}

	/*
	 * Return a random password string generated using RPG
	 */
	public function rng()
	{
		$rngpass = RPG::Preset(Auth::user()->rng_level);
		return response()->json(array('random' => $rngpass));
	}

	/*
	 * Display the account details page
	 */
	public function view(Request $request)
	{	
		$messages = [
			'id.required' => 'Invalid Request. Tampering with source detected',
			'id.numeric' => 'Invalid Request. ID not numeric. Tampering with source detected',
		];

		$this->validate($request, [
			'id' => 'required|numeric',
		], $messages);

		$account_id = request()->get('id');

		$account = Account::find($account_id);

		if(! $account)
			return back()->withErrors('Invalid Request. Account Does Not Exists');

		if($account->user_id == Auth::id())
		{
			$this->authorize('update',$account);

			return view('ui.accounts.view', [
				'account' => $account,
				'account_notes' => $account->account_notes,
			]);
		}
		else
			return back()->withErrors('Invalid Request');
	}

	/*
	 * Accept an Account Modal and Update request and patch the account
	 */
	public function update(AccountUpdateForm $request, Account $account)
	{
		$this->authorize('update',$account);

		$account->update(request(['title','link','login_id','login_password','additional_info']));

		return redirect('accounts')->with('success', 'Account Updated Successfully');
	}

	/*
	 * Accept Delete request and remove the Account from the db.
	 */
	public function destroy(Request $request)
	{
		$messages = [
			'id.required' => 'Invalid Request. Please try again',
			'id.numeric' => 'Invalid Request. Tampering with source detected',
		];

		$this->validate($request, [
			'id' => 'required|numeric',
		], $messages);

		$account_id = request()->get('id');

		$account = Account::find($account_id);

		if(! $account)
			return back()->withErrors('Invalid Request. Account Does Not Exists');

		if($account->user_id == Auth::id())
		{
			$this->authorize('update',$account);

			$account->delete();

			return redirect('accounts')->with('success', 'Account Deleted Successfully');
		}
		else
			return redirect('accounts')->withErrors('Invalid Request');
	}

	/*
	 * Export all accounts
	 */
	public function export(Request $request)
	{
		$messages = [
	        'export.required' => 'Please select YES to Export Accounts.',
	        'export.numeric' => 'Selection Invalid.',
	        'code.numeric' => 'The Authentication Code must be a number.',
	        'password.required' => 'Password is required to Export Accounts.',
        ];

        $this->validate($request, [
	        'code' => 'numeric',
	        'export' => 'required|numeric',
	        'password' => 'required',
        ], $messages);

        if(!($request->export==1))
            return redirect('accounts')->with('danger', 'Invalid Option Selected');

        $pw = $request->password;

        if (Hash::check($pw, Auth::user()->password))
        {
            if(Auth::user()->two_step)
            {   
                $code = $request->code;

                $google2fa = new Google2FA(); 

                $window = 8;

                $valid = $google2fa->verifyKey(Auth::user()->google2fa_secret, $code, $window);

                if(!$valid)
                {
                    return redirect('accounts')->with('danger', 'Invalid Authentication Code');
                }
            }

            if(Auth::user()->totalAccounts() == 0)
            	return redirect('/accounts')->with('danger', 'Cannot Export with 0 Accounts in the Vault');
            
            else
            {
       			Mail::to(Auth::user()->email)->send(new AccountsExportedNotificationEmail());
       			return $this->excel->download(new AccountsExport, 'accounts.xlsx');
            }
       	}
       	else
            return redirect('accounts')->with('danger', 'Invalid Password.');
	}
}
