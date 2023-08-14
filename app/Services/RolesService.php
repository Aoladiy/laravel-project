<?php

namespace App\Services;

use App\Contracts\Repositories\RolesRepositoryContract;

class RolesService implements \App\Contracts\Services\RolesServiceContract
{
    public function __construct(private readonly RolesRepositoryContract $rolesRepository)
    {
    }

    public function userHasRole(int $userId, string $role): bool
    {
        return $this->rolesRepository->hasRole($userId, $role);
    }

    public function userIsAdmin(int $userId): bool
    {
        return $this->rolesRepository->hasRole($userId, 'admin');
    }
}
