<?php

namespace App\Providers;

use App\Events\BookRatingRecalculateEvent;
use App\Listeners\BookRatingUpdateListener;
use App\Models\Comment;
use App\Observers\CommentObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        BookRatingRecalculateEvent::class => [
            BookRatingUpdateListener::class,
        ],
    ];

    public function boot(): void
    {
        Comment::observe(CommentObserver::class);
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
