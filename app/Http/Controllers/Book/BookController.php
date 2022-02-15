<?php

namespace App\Http\Controllers\Book;

use App\Factories\BookFactory;
use App\Http\Controllers\Controller;
use App\Models\Book\Book;
use App\Models\User\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{

    public function __construct(private AuthorRepository $authorRepository) {}

    public function getAuthor(Book $book)
    {
        return $book->authorName;
    }

    /**
     * Метод возвращает шаблон с функционалом добавления новой книги указанным автором
     */
    public function addBook(Author $author): View
    {
        return \view('book.add-book', ['author' => $author]);
    }

    /**
     * Метож добавляет новую книгу и првязывает ее к автору
     */
    public function store(Request $request)
    {
        $author = $this->authorRepository->getAuthorById($request->get('author'));
        $book = $author->books()->create($request->all());

        return redirect()->route('book.show', ['book' => $book]);
    }


    /**
     * Метод открывает шаблон с информацией о книге
     */
    public function show(Book $book)
    {
        return \view('book.show')->with(['book' => $book->load('authors')]);
    }
}
