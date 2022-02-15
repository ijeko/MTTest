<?php

namespace App\Models\Book;

use App\Models\User\Author;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Сущность книга
 *
 * @property string $title Название книги
 * @property string $slug Сокращенное название книги
 *
 * @property Collection|Author $authors Связь с авторами
 * @property Author $author Автор кгиги
 * @property string $authorName Имя автора книги
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];

    /**
     * Метод возвращает автора книги в виде коллекции
     */
    public function authors():BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    /**
     * Метод возвращает имя автора книги
     */
    public function authorName(): Attribute
    {
        return new Attribute(
        get: fn () => $this->authors->first()->name);
    }

    /**
     * Метод возвращает автора книги
     */
    public function author(): Attribute
    {
        return new Attribute(
            get: fn () => $this->authors->first());
    }
}
