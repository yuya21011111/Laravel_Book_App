<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        $books = Book::paginate(10);
        return view('book.index',compact('books'));
    }

    public function show(Book $book) {
        return view('book.show',[
            'book' => $book
        ]);
    }

    public function edit(Book $book) {
        return view('book.edit',[
            'book' => $book
        ]);
    }

    public function update(Request $request) {
        dd($request);
       return view('book.index');
    }
}
