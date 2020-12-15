<?php

namespace App\Policies;

use App\User;
use App\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;

    /**
     * Policy for athorizing Account modifications
     *
     */
    public function update(User $user, Account $account)
    {
        return $account->user_id == $user->id;
    }
}
