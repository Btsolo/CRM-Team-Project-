<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER]) || Task::where('user_id',$user->id)->exists()
        ?Response::allow()
        :Response::deny('You do not have permission to view this tasks');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task): Response
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_MANAGER]) 
        || $user->id === $task->user_id
        ?Response::allow()
        :Response::deny('You do not have permission to view this task');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to create tasks');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to update tasks');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to delete tasks');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to restore tasks');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): Response
    {
        return Response::deny('Tasks cannot be deleted permanently');
    }
}
