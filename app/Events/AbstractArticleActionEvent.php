<?php

namespace App\Events;

use App\Contracts\Events\ArticleActionEventContract;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

abstract class AbstractArticleActionEvent implements ArticleActionEventContract
{
    public function __construct(public readonly Article $article)
    {
    }

    public function article(): Article
    {
        return $this->article;
    }
}
