<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CustomerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to view customers');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Customer $customer): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to view customer');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to create customers');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Customer $customer): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to update customers');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Customer $customer): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to delete customers');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Customer $customer): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to restore customers');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Customer $customer): Response
    {
        return in_array($user->role_id,[Role::IS_ADMIN,Role::IS_MANAGER])
        ?Response::allow()
        :Response::deny('You do not have permission to forcedelete tasks');
    }
}
