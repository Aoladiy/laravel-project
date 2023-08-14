<?php

namespace App\Listeners;

use App\Events\ArticleDeletedEvent;
use App\Mail\ArticleDeletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ArticleDeletedListener
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
    public function handle(ArticleDeletedEvent $event): void
    {
        if ($email = config('mail.to.address')) {
            Mail::to($email)->send(new
            ArticleDeletedMail($event->article()));
        }
    }
}
