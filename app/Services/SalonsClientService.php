<?php

namespace App\Services;

use App\Contracts\Services\SalonsClientServiceContract;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    public function __construct(private readonly string $baseUrl,
                                private readonly string $login,
                                private readonly string $password)
    {
    }

    public function test()
    {
        return [
            'baseUrl' => $this->baseUrl,
            'login' => $this->login,
            'password' => $this->password,
        ];
    }

    public function getRandomSalons(int $amount = 2): array|null
    {
        try {
            return Http::withBasicAuth($this->login, $this->password)
                ->baseUrl($this->baseUrl)
                ->get('salons', ['limit' => $amount, 'in_random_order'])
                ->json();
        } catch (RequestException $e) {
            return null;
        }
    }

    public function getAllSalons(): array|null
    {
        try {
            return Http::withBasicAuth($this->login, $this->password)
                ->baseUrl($this->baseUrl)
                ->get('salons')
                ->json();
        } catch (RequestException $e) {
            return null;
        }
    }
}
