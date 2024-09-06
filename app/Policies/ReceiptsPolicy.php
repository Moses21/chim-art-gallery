<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Receipts;
use App\Models\User;

class ReceiptsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Receipts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Receipts $receipts): bool
    {
        return $user->checkPermissionTo('view Receipts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Receipts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Receipts $receipts): bool
    {
        return $user->checkPermissionTo('update Receipts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Receipts $receipts): bool
    {
        return $user->checkPermissionTo('delete Receipts');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Receipts $receipts): bool
    {
        return $user->checkPermissionTo('restore Receipts');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Receipts $receipts): bool
    {
        return $user->checkPermissionTo('force-delete Receipts');
    }
}
