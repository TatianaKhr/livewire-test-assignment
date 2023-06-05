<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\DTO\Comment\StoreDto;
use App\Service\CommentService;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\Exists;
use Livewire\WithPagination;

class Comment extends BaseComponent
{
    use WithPagination;

    public int $bookId;

    public string $description = '';

    public string $title = '';

    public int $grade = 0;

    private CommentService $service;

    public function rules():array
    {
        return [
            'bookId' => [
                'required',
                'integer',
                (new Exists('books', 'id'))->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'description' => ['required', 'string', 'min:5', 'max:255'],
            'grade' => ['required', 'int', 'min:0', 'max:5'],
        ];
    }

    final public function boot(
        CommentService $service,
    )
    {
        $this->service = $service;
    }

    final public function mount(int $bookId): void
    {
        $this->bookId = $bookId;
    }

    final public function render(): View
    {
        $comments = $this->service->catalog(id: $this->bookId);

        return view('livewire.comment', compact('comments'));
    }

    final public function addComment(): void
    {
        $dto = new StoreDto(
            bookId: $this->validate()['bookId'],
            title: $this->validate()['title'],
            description: $this->validate()['description'],
            grade: $this->validate()['grade'],
        );

        $this->service->save(dto: $dto);

        $this->reset(['title', 'description', 'grade']);
        $this->resetPage();
    }
}
