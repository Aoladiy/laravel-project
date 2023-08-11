<?php

namespace App\Services\Commands;

use App\Contracts\Services\Commands\StatisticsServiceContract;
use App\Models\Article;
use Illuminate\Console\Command;

class StatisticsService implements StatisticsServiceContract
{

    public function showStandardTable(Command $command, array $data): bool
    {
        try {
            $command->table([
                'cars_amount',
                'articles_amount',
                'most_widespread_tag',
                'average_number_of_news_per_tag',
            ],
                [[
                    $data['cars_amount'],
                    $data['articles_amount'],
                    $data['most_widespread_tag']->name,
                    round($data['average_article_count_per_tag'], 3),
                ]]);
            return true;
        } catch (\Throwable $exception) {
            return false;
        }
    }

    public function showLongestArticleTable(Command $command, Article $longest_article): bool
    {
        try {
            $command->table([
                'longest_article_title',
                'longest_article_id',
                'longest_article_length',
            ], [[
                $longest_article->title,
                $longest_article->id,
                $longest_article->body_length,
            ]]);
            return true;
        } catch (\Throwable $exception) {
            return false;
        }
    }

    public function showShortestArticleTable(Command $command, Article $shortest_article): bool
    {
        try {
            $command->table([
                'shortest_article_title',
                'shortest_article_id',
                'shortest_article_length',
            ], [[
                $shortest_article->title,
                $shortest_article->id,
                $shortest_article->body_length,
            ]]);
            return true;
        } catch (\Throwable $exception) {
            return false;
        }
    }

    public function showMostTaggedArticleTable(Command $command, Article $most_tagged_article): bool
    {
        try {
            $command->table([
                'most_tagged_article_title',
                'most_tagged_article_id',
                'most_tagged_article_tags_amount',
            ], [[
                $most_tagged_article->title,
                $most_tagged_article->id,
                $most_tagged_article->tags_count,
            ]]);
            return true;
        } catch (\Throwable $exception) {
            return false;
        }
    }
}
