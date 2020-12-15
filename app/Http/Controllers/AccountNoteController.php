<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use App\AccountNote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountNoteController extends Controller
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
     * Storing a newly created Account Note in database.
     */
     public function store(Account $account)
    {
        $this->validate(request(), [
            'content' => ' required|min:3|max:115'
        ]);

        $account_note = new AccountNote();

        $account_note->content = request('content');

        $account_note->user_id = auth()->id();

        $account->account_notes()->save($account_note);

        if (request()->expectsJson()) {
            return $account_note;
        }

        return back();
    }

    /*
     * Deleting an Account Note in database.
     */
    public function destroy(AccountNote $accountNote)
    {
        if ($accountNote->user->id == auth()->id()) {
            
            $this->authorize('update',$accountNote);
            $accountNote->delete();

            if (request()->expectsJson()) {
                return response(302);
                }

            return back();
            }

        return redirect('/accounts');
            
    }
}
