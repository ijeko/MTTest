<?php

use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\Admin\BookController as AdminBookController;
use App\Http\Controllers\User\Author\AuthorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');


//TASK 1
Route::controller(BookController::class)->group(function () {
    Route::get('/author/{author}/book', 'addBook')->name('book.add-book');
    Route::post('/book', 'store')->name('book.store');
    Route::get('/book/{book}', 'show')->name('book.show');
});

Route::controller(AdminBookController::class)->group(function () {
    Route::get('/admin/book/{book}', 'show')->name('admin.book.edit');
    Route::patch('/admin/book/{book}', 'update')->name('admin.book.update');
});
Route::get('/author/{author}/books', [AuthorController::class, 'getBooks'])->name('author.books');

//TASK 2
Route::get('/task2', function () {
    return view('tasks.task2');
})->name('task2');

//TASK 3
Route::get('/task3', function () {
    return view('tasks.task3');
})->name('task3');

//TASK 4
Route::get('/task4', function () {
    return view('tasks.task4');
})->name('task4');
