<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;


Route::get('/books/{uuid}', [bookController::class, 'show'])->name('books.show');
