<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class RolesRepository implements \App\Contracts\Repositories\RolesRepositoryContract
{
    public function __construct(private readonly Role $role)
    {
    }

    public function hasRole(int $userId, string $role): bool
    {
        return $this->getRole()
            ->whereHas('users', fn(Builder $query) => $query->where('id', $userId))
            ->where('name', $role)
            ->exists();
    }

    private function getRole(): Role
    {
        return $this->role;
    }
}
