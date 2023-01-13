<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $count = Book::count();
        return view('layout.libraryPage')
            ->with('books', $books)
            ->with('count', $count);
    }
}
