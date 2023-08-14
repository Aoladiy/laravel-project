<?php

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use App\Mail\ArticleCreatedMail;
use App\Models\Article;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ArticleCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ArticleCreatedEvent $event): void
    {
        if ($email = config('mail.to.address')) {
            Mail::to($email)->send(new
            ArticleCreatedMail($event->article()));
        }
    }
}
