<?php

namespace App\Repositories;

use App\Models\Book\Book;
use Illuminate\Support\Collection;

class BookRepository
{
    /**
     * Метод возвращает список всех книг
     */
    public function getBooksList(): Collection
    {
        return Book::query()->get();
    }
}
