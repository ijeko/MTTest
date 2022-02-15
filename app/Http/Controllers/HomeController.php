<?php

namespace App\Http\Controllers;

use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(private AuthorRepository $authorRepository, private BookRepository $bookRepository)
    {
    }


    /**
     * Метод отображает главную страницу
     */
    public function __invoke(): View
    {
        $authors = $this->authorRepository->getAuthorsList();
        $books = $this->bookRepository->getBookslist();

        return \view('welcome', ['authors' => $authors, 'books' => $books]);
    }
}
