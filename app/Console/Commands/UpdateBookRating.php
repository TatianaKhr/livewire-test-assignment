<?php

namespace App\Console\Commands;

use App\Events\BookRatingRecalculateEvent;
use App\Models\Book;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class UpdateBookRating extends Command
{
    protected $signature = 'app:update-book-rating';

    protected $description = 'Command description';

    public function handle()
    {
       Book::chunk(50, function (Collection $books) {
            foreach ($books as $book) {
                event(new BookRatingRecalculateEvent($book));
            }
        });
    }
}
