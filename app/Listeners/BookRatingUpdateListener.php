<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\BookRatingRecalculateEvent;
use App\Service\BookRatingService;
use Illuminate\Support\Facades\Log;

class BookRatingUpdateListener
{
    public function __construct(
        private readonly BookRatingService $service)
    {
    }

    public function handle(BookRatingRecalculateEvent $commentEvent): void
    {
        $recalculationResult = $this->service->performRecalculation($commentEvent->book);

        if ($recalculationResult === false) {
            Log::warning('Recalculation failed for book: ' . $commentEvent->book->id);
        }
    }
}
