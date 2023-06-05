<?php

declare(strict_types=1);

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('book.catalog');
Route::get('/books/{book}', [BookController::class, 'show'])->name('book.show')->middleware('book.exist');
