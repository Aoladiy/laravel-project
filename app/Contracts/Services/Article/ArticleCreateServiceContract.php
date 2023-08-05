<?php

namespace App\Contracts\Services\Article;

use App\Contracts\Repositories\ArticlesRepositoryContract;

interface ArticleCreateServiceContract
{
    public function create(array $data, $tags);
}
