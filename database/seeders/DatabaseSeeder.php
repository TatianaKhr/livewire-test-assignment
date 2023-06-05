<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Events\BookRatingRecalculateEvent;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Event;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Event::fake();

        $books = Book::factory()->hasComments(random_int(1, 10))->count(20)->create();

        Event::assertNotDispatched(BookRatingRecalculateEvent::class);
        Event::swap(Event::getFacadeRoot());
    }
}
