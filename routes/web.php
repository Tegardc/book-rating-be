<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
// Route::get('/books', [BooksController::class, 'index'])->name('books.index');
// Route::get('/rate', [RatingController::class, 'create'])->name('rate.create');
// // Route::post('/rate', [RatingController::class, 'store'])->name('rate.store');

// Route::get('/getBooks/{author_id}', [RatingController::class, 'getBooks']);
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

// Route untuk Books
Route::get('/books', [BooksController::class, 'index'])->name('books.index');

// Route untuk Rating
Route::get('/rate', [RatingController::class, 'create'])->name('rate.create');
Route::post('/rate', [RatingController::class, 'store'])->name('rate.store'); // Dinyalakan kembali

// Route untuk mengambil daftar buku berdasarkan Author
Route::get('/getBooks/{author_id}', [RatingController::class, 'getBooks'])->name('books.byAuthor');
