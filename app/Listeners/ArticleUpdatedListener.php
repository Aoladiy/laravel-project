<?php

namespace App\Listeners;

use App\Events\ArticleUpdatedEvent;
use App\Mail\ArticleUpdatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ArticleUpdatedListener
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
    public function handle(ArticleUpdatedEvent $event): void
    {
        if ($email = config('mail.to.address')) {
            Mail::to($email)->send(new
            ArticleUpdatedMail($event->article()));
        }
    }
}
