<?php

namespace App\Factories;

use App\Models\Book\Book;

class BookFactory
{
    public function create(array $params): Book
    {
        return Book::create($params);
    }
}
