<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function viewAny(User $user)
    {
        //
        $users = $user->RoleUser()->pluck('roles_id');
        foreach ($users as $key => $id) {
            if ($id == 1)
            return true;
           else if ($id == 1 && 2)
            return true; 

        }
    }

}
