<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Contracts\Services\Commands\StatisticsServiceContract;
use App\Models\Article;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Statistics extends Command
{
    public function __construct(public readonly StatisticsServiceContract  $statisticsServiceContract,
                                public readonly ArticlesRepositoryContract $articlesRepositoryContract,
                                public readonly CarsRepositoryContract     $carsRepositoryContract,
                                public readonly TagsRepositoryContract     $tagsRepositoryContract)
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get some statistics';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cars_amount = $this->carsRepositoryContract->getAmountOfCars();
        $articles_amount = $this->articlesRepositoryContract->getAmountOfNews();
        $most_widespread_tag = $this->tagsRepositoryContract->getMostWidespreadTag();
        $longest_article = $this->articlesRepositoryContract->getLongestArticle();
        $shortest_article = $this->articlesRepositoryContract->getShortestArticle();
        $average_article_count_per_tag = $this->tagsRepositoryContract->getAverageArticleCountPerTag();
        $most_tagged_article = $this->articlesRepositoryContract->getMostTaggedArticle();

        if (
            $this->statisticsServiceContract->showStandardTable($this, [
                'cars_amount' => $cars_amount,
                'articles_amount' => $articles_amount,
                'most_widespread_tag' => $most_widespread_tag,
                'average_article_count_per_tag' => $average_article_count_per_tag
            ]) &&
            $this->statisticsServiceContract->showLongestArticleTable($this, $longest_article) &&
            $this->statisticsServiceContract->showShortestArticleTable($this, $shortest_article) &&
            $this->statisticsServiceContract->showMostTaggedArticleTable($this, $most_tagged_article)
        ) {
            return Command::SUCCESS;
        } else {
            return Command::FAILURE;
        }
    }
}
