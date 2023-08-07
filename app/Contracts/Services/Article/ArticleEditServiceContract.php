<?php

namespace App\Contracts\Services\Article;

interface ArticleEditServiceContract
{
    public function edit(array $data, $id, $tags);
}
