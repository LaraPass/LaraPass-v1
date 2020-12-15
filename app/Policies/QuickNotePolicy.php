<?php

namespace App\Policies;

use App\User;
use App\QuickNote;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuickNotePolicy
{
    use HandlesAuthorization;

    /**
     * Policy for athorizing Quick Note modifications
     *
     */
    public function update(User $user, QuickNote $quick_note)
    {
        return $quick_note->user_id == $user->id;
    }
}
