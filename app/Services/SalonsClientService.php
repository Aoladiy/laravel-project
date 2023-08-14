<?php

namespace App\Services;

use App\Contracts\Services\SalonsClientServiceContract;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    public function __construct(private readonly string $baseUrl,
                                private readonly string $login,
                                private readonly string $password)
    {
    }

    public function getRandomSalons(int $amount = 2): array|null
    {
        return $this
            ->getSalons('salons', ['limit' => $amount, 'in_random_order' => true])
            ->json();
    }

    public function getAllSalons(): array|null
    {
        return $this
            ->getSalons('salons')
            ->json();
    }

    public function getSalons(string  $url,
                              ?array  $parameters = null,
                              ?string $baseUrl = null,
                              ?string $login = null,
                              ?string $password = null,
    ): Response|null
    {
        try {
            return Http::withBasicAuth($login ?? $this->login, $password ?? $this->password)
                ->withOptions(["verify"=>false]) // видимо у меня на локальном компе проблемы с проверкой ssl сертификата, ибо без этого параметра не работает
                ->baseUrl($baseUrl ?? $this->baseUrl)
                ->get($url, $parameters);
        } catch (RequestException $e) {
            return null;
        }
    }
}
