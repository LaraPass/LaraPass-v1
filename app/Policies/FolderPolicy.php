<?php

namespace App\Policies;

use App\Folder;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FolderPolicy
{
    use HandlesAuthorization;

    /**
     * Policy for athorizing Folder modifications.
     */
    public function update(User $user, Folder $folder)
    {
        return $folder->user_id == $user->id;
    }
}
