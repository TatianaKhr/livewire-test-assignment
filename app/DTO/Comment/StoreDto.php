<?php
declare(strict_types=1);

namespace App\DTO\Comment;

class StoreDto
{
    public function __construct(
        private readonly int    $bookId,
        private readonly string $title,
        private readonly string $description,
        private readonly int    $grade)
    {
    }

    final public function getBookId(): int
    {
        return $this->bookId;
    }

    final public function getTitle(): string
    {
        return $this->title;
    }

    final public function getDescription(): string
    {
        return $this->description;
    }

    final public function getGrade(): int
    {
        return $this->grade;
    }
}
