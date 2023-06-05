<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    public function __construct(
        private readonly Book $book,
    ) {
    }

    public function catalog(): Collection
    {
        return $this->book->all();
    }

    public function show(int $id): Book|null
    {
        return $this->book->find($id);
    }
}
