<?php

namespace App\Contracts\Services\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

interface StatisticsServiceContract
{
    public function showStandardTable(Command $command, array $data): bool;
    public function showLongestArticleTable(Command $command, Article $longest_article): bool;
    public function showShortestArticleTable(Command $command, Article $shortest_article): bool;
    public function showMostTaggedArticleTable(Command $command, Article $most_tagged_article): bool;
}
