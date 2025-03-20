<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to view users');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER]) || request()->auth()->id == $user->id
        ?Response::allow()
        :Response::deny('You do not have permission to view user');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to create user');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER]) || request()->auth()->id == $user->id
        ?Response::allow()
        :Response::deny('You do not have permission to update user');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER]) || request()->auth()->id == $user->id
        ?Response::allow()
        :Response::deny('You do not have permission to delete user');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER]) 
        ?Response::allow()
        :Response::deny('You do not have permission to restore user');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): Response
    {
        return Response::deny('Users cannot be deleted permanently');
    }
}
