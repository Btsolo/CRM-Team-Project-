<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return 
        Response::allow()
        ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Project $project): Response
    {
        return 
        Response::allow()
        ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to create project');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Project $project): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to update project');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Project $project): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to delete projects');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Project $project): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to restore projects');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Project $project): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to forcedelete tasks');
    }
}
