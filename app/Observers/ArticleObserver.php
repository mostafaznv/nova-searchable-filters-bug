<?php

namespace App\Observers;

use App\Models\Article;


class ArticleObserver
{
    public function creating(Article $article): void
    {
        $article->user_id = request()->user()->id;
    }
}
