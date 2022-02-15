<?php

namespace App\Http\Controllers\User\Author;

use App\Http\Controllers\Controller;
use App\Models\User\Author;
use Illuminate\View\View;

class AuthorController extends Controller
{

    /**
     * Метод возвращает все книги указанного автора
     */
    public function getBooks(Author $author): View
    {
        return \view('author.books',['author' => $author]);
    }
}
