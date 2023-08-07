<?php

namespace App\Contracts\Services\Article;

interface ArticleDeleteServiceContract
{
    public function delete(string $slug): void;
}
