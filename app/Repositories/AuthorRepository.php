<?php

namespace App\Repositories;

use App\Models\User\Author;
use Illuminate\Support\Collection;

class AuthorRepository
{

    /**
     * Метод возвращает список всех авторов
     */
    public function getAuthorsList(): Collection
    {
        return Author::query()->get();
    }

    /**
     * Метод возвращает автора с указанным ID
     */
    public function getAuthorById(int $id): Author
    {
        return Author::findOrFail($id);
    }

    /**
     * Метод возвращает список всех авторов за исключением указанного
     */
    public function getAuthorsListExcept(int $id): Collection
    {
        return Author::query()
            ->whereNotIn('id', [$id])
            ->get();
    }
}
