<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\BookService;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    public function __construct(
        private readonly BookService $service
    ) {
    }

    public function index(): View
    {
        $books = $this->service->catalog();

        return view('catalog', compact('books'));
    }

    public function show(int $id): View
    {
        $book = $this->service->show(id: $id);

        return view('show', compact('book'));
    }
}
