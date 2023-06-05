<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Book;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookRatingRecalculateEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Queueable;

    public function __construct(
        public Book $book
    )
    {
    }
}
