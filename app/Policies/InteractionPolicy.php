<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Models\Interaction;
use Illuminate\Auth\Access\Response;

class InteractionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to view interactions');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Interaction $interaction): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to view interaction');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to create interaction');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Interaction $interaction): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to update interaction');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Interaction $interaction): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to delete interaction');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Interaction $interaction): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to restore interaction');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Interaction $interaction): Response
    {
        return Response::deny('Interactions cannot be permanently deleted');
    }
    
}
