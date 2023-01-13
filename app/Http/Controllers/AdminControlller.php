<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminControlller extends Controller
{
    private function randomDigit()
    {
        $pass = substr(str_shuffle('01002345678923'), 0, 10);
        return $pass;
    }

    public function index()
    {
        $books = Book::all();
        return view('layout.adminPage')->with('books', $books);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'author' => ['required'],
            'ISBN' => ['required', 'unique:books'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin')
                ->withErrors($validator)
                ->withInput();
        }

        Book::create([
            'bookId' => $this->randomDigit(),
            'title' => $request->title,
            'author' => $request->author,
            'ISBN' => $request->ISBN,
        ]);

        return back();
    }

    public function deleteItem(Request $request)
    {
        $book = Book::where('bookId', $request->id)->delete();
        return redirect()->route('admin');
    }
}
