<?php

declare(strict_types=1);

namespace App\Observers;

use App\Events\BookRatingRecalculateEvent;
use App\Models\Comment;

class CommentObserver
{
    public function created(Comment $comment): void
    {
        event(new BookRatingRecalculateEvent($comment->book));
    }
}
