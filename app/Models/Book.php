<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'books';

    protected $guarded = false;

    protected $fillable = [
        'title',
        'description',
        'cover_path',
        'rating'
    ];

    final public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'book_id', 'id');
    }
}
