<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use Illuminate\Http\Request;

class EditBookController extends Controller
{
    public function index(Request $request)
    {
        $book = Book::where('bookId', $request->id)->first();
        if (isset($request->id)) {
            return view('layout.editBook')->with('book', $book);
        } else {
            return redirect()->route('admin');
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'author' => ['required'],
            'ISBN' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        // return dd('das');

        $books = Book::where('bookId', $request->id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'ISBN' => $request->ISBN,
        ]);
        return back();
    }
}
