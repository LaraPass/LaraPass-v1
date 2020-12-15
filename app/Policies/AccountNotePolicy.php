<?php

namespace App\Policies;

use App\User;
use App\AccountNote;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountNotePolicy
{
    use HandlesAuthorization;

    /**
     * Policy for athorizing Account Note modifications
     *
     */
    public function update(User $user, AccountNote $account_note)
    {
        return $account_note->user_id == $user->id;
    }
}
