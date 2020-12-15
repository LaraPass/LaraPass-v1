<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Account;
use App\Folder;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\AccountStoreForm;

class FoldersController extends Controller
{
    /**
     * Adding auth & 2FA middleware to this controller.
     *
     */
    public function __construct()
	{
		$this->middleware(['auth','verified','2fa']);
	}

	/*
	 * Create a new folder for a user
	 */
	public function create(Request $request)
	{
		$messages = [
			'name.requied' => 'Title is required',
			'name.min' => 'Title should have minimum 3 characters',
			'icon.required' => 'Icon is required',
		];

		$this->validate($request, [
			'name' => 'required|min:3',
			'icon' => 'required'
		], $messages);

		$folder = new Folder($request->all());

		Auth::user()->folders()->save($folder);

		return redirect('accounts')->with('success', 'Folder Created Successfully');
	}

	/*
	 * Add an account to a folder
	 */
	public function addAccount(Request $request, Account $account)
	{
		$messages = [
			'folder.required' => 'Invalid Request. Folder ID is required',
			'folder.numeric' => 'Invalid Request. Source tampering detected',
		];

		$this->validate($request, [
			'folder' => 'required|numeric',
		], $messages);

		$fid = $request->folder;

		$folder = Folder::find($fid);

		if(! $folder)
			return redirect('accounts')->withErrors('Invalid Request. Folder Does Not Exists');

		if($folder->user_id == Auth::id())
		{
			$this->authorize('update',$folder);

			$this->authorize('update',$account);

			$folder->accounts()->attach($account);

			return redirect('accounts')->with('success','Folder Linked Successfully');
		}
		else
			return redirect('accounts')->withErrors('Invalid Request');

	}

	/*
	 * Remove an account from a folder
	 */
	public function removeAccount(Account $account, Folder $folder)
	{
		$this->authorize('update',$folder);

		$this->authorize('update',$account);

		$folder->accounts()->detach($account);

		return redirect('accounts')->with('success','Folder Unlinked Successfully');
	}

	/*
	 * Delete a folder and disassociate all accounts linked to it
	 */
	public function destroy(Folder $folder, Request $request)
	{
		$this->authorize('update',$folder);

		if($folder->password)
		{
			if($folder->password != $request->folder_password)
				return redirect('accounts')->with('danger','Invalid Folder Password. Please check and try again');
		}	

		if($request->delete)
		{
			if($request->delete_accounts)
			{
				$accounts = $folder->accounts()->get();

				foreach($accounts as $account)
				{
					$this->authorize('update',$account);

					$account->delete();
				}
			}

			$this->authorize('update',$folder);

			$folder->delete();

			return redirect('accounts')->with('success', 'Folder Deleted Successfully');
		}

		return redirect('accounts')->with('warning', 'Invalid Request');
	}

	/*
	 * Add Password protection to folders
	 */
	public function addPassword(Folder $folder, Request $request)
	{
		$this->validate($request, [
			'password' => 'required|min:3|max:155',
		]);

		$this->authorize('update',$folder);

		$folder->password = $request->password;
		$folder->save();

		return back()->with('success', 'Password Successfully Added to Folder. Accounts under this folder are now hidden from overview');
	}

	/*
	 *	Display Password Protected Folders' Content
	 */
	public function folderView(Request $request)
	{
		$folder = Folder::findOrFail($request->id);

		if($folder->password == null)
		{
			$this->authorize('update',$folder);
			$accounts = $folder->accounts()->get();
			$categories = Category::where('active',1)->get();
			return view('ui.accounts.folder')->with(compact('categories','accounts','folder'));
		}

		$this->validate($request, [
			'password' => 'required|min:3|max:155',
		]);

		$this->authorize('update',$folder);

		if($folder->password == $request->password)
		{
			$accounts = $folder->accounts()->where('folder_id',$folder->id)->get();
			$categories = Category::where('active',1)->get();
			return view('ui.accounts.folder')->with(compact('categories','accounts','folder'));
		}
		else
			return back()->with('danger', 'Invalid Password, Please try again.');
	}

	/*
	 * Remove password protection from a folder
	 */
	public function removePassword(Folder $folder)
	{
		if($folder->user_id == Auth::id())
		{
			$this->authorize('update',$folder);

			$folder->password = null;
			$folder->save();

			return redirect('accounts')->with('success','Folder Protection Removed Successfully');
		}
		else
			return redirect('accounts')->withErrors('Invalid Request');
	}

	/* 
	 * Store a newly created account into vault 
	 */
	public function folderAddAccount(AccountStoreForm $request)
	{
		$account = new Account($request->all());

		//Code to check and add http to link if it doesnt exists.
        if (!preg_match("~^(?:f|ht)tps?://~i", $account->link)) {
        	$account->link = "http://" . $account->link;
        } 

        $folder = Folder::find($request->folder);

		if(! $folder)
			return redirect('accounts')->withErrors('Invalid Request. Folder Does Not Exists');

        $save = Auth::user()->accounts()->save($account);

        $folder->accounts()->attach($save);

        $accounts = $folder->accounts()->where('folder_id',$folder->id)->with('folder')->get();

		$categories = Category::where('active',1)->get();

		Session::flash('message', 'Account Added Successfully'); 

		return view('ui.accounts.folder')->with(compact('categories','accounts','folder'));
	}
}
