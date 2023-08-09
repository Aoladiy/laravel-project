<?php

namespace App\Contracts\Services;

interface SalonsClientServiceContract
{
    public function __construct(string $baseUrl, string $login, string $password);

    public function getRandomSalons(int $amount): array|null;

    public function getAllSalons(): array|null;
}
