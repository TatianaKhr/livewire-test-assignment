<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\Comment\StoreDto;
use App\Models\Comment;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentService
{
    public function __construct(
        private readonly Comment $comment,
    ) {
    }

    public function catalog(int $id): LengthAwarePaginator
    {
        return $this->comment->getByBookId(id: $id)
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    }

    public function save(StoreDto $dto): Comment
    {
        return $this->comment->create([
            'book_id' => $dto->getBookId(),
            'title' => $dto->getTitle(),
            'description' => $dto->getDescription(),
            'grade' => $dto->getGrade(),
        ]);
    }
}
