<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Venue;
use App\Support\PermissionHelper;
use Illuminate\Auth\Access\Response;

class VenuePolicy
{
    private PermissionHelper $helper;

    public function __construct()
    {
        $this->helper = new PermissionHelper('venue');
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can($this->helper->viewAny());
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Venue $venue): bool
    {
        return $user->can($this->helper->view());
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can($this->helper->create());
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Venue $venue): bool
    {
        return $user->can($this->helper->update());
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Venue $venue): bool
    {
        return $user->can($this->helper->delete());
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Venue $venue): bool
    {
        return $user->can($this->helper->restore());
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Venue $venue): bool
    {
        return $user->can($this->helper->forceDelete());
    }
}
