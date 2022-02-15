<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book\Book;
use App\Repositories\AuthorRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function __construct(private AuthorRepository $authorRepository)
    {
    }


    /**
     * Метод возвращает шаблон с возможностью редактировать автора книги
     */
    public function show(Book $book): View
    {
        $authors = $this->authorRepository->getAuthorsListExcept($book->author->id);
        return view('book.edit', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Метод обновляет запись о книге
     */
    public function update(Book $book, Request $request): RedirectResponse
    {

        $newAuthor = $this->authorRepository->getAuthorById($request->get('author'));

        $book->authors()->detach();
        $book->authors()->attach($newAuthor);

        return redirect()->route('admin.book.edit', [$book]);
    }
}
