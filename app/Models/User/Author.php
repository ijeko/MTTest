<?php

namespace App\Models\User;

use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property integer $id ID
 * @property string $name Имя автора
 *
 * @property Book $books Книги автора
 */
class Author extends User
{
    use HasFactory;

    /**
     * Метод возвращает все книги автора
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
