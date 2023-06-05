<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Book;

class BookRatingService
{
    public function performRecalculation(Book $book): bool
    {
        $averageRating = $book->comments->avg('grade');

        return $book->update(['rating' => $averageRating]);
    }
}
