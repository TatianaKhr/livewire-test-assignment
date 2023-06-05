<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Service\BookService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookIsExist
{
    public function __construct(
        private readonly BookService $service
    )
    {
    }

    public function handle(Request $request, Closure $next): Response|string
    {
        $book = $this->service->show(id: (int)$request->route('book'));

        if (is_null($book)) {
            abort(404);
        }

        return $next($request);
    }
}
