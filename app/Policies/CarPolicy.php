<?php

namespace App\Policies;

use App\Contracts\Services\RolesServiceContract;
use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CarPolicy
{
    use HandlesAuthorization;

    public function __construct(private readonly RolesServiceContract $rolesServiceContract)
    {
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->rolesServiceContract->userHasRole($user->id, 'admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Car $car): bool
    {
        return $this->rolesServiceContract->userHasRole($user->id, 'admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->rolesServiceContract->userHasRole($user->id, 'admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Car $car): bool
    {
        return $this->rolesServiceContract->userHasRole($user->id, 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Car $car): bool
    {
        return $this->rolesServiceContract->userHasRole($user->id, 'admin');
    }
}
