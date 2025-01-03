<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class bookController extends Controller
{


    public function show($uuid)
    {
        $book = Book::where('uuid', $uuid)->firstOrFail();
        return view('book', compact('book'));
    }
}
