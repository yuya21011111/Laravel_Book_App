<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index() {
        // トップ画面
        $books = Book::paginate(10);
        return view('book.index',compact('books'));
    }

    public function show(Book $book) {
        // 詳細画面
        return view('book.show',[
            'book' => $book
        ]);
    }

    public function edit(Book $book) {
        // 編集画面
        return view('book.edit',[
            'book' => $book
        ]);
    }

    public function update(Request $request,$id) {
        // 編集した後の本の更新処理
        $request->validate([
            'name' => ['required', 'string'],
            'status' => ['required', 'string'],
            'author' => ['nullable','string'],
            'publication' => ['nullable','string'],
            'read_at' => ['nullable','date'],
            'note' => ['nullable','string','max:200'],
            // 'image1' => ['nullable'],
        ]);

        // トランザクション処理
    try{
        DB::transaction(function () use($request,$id) {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->status = $request->status;
        $book->author = $request->author;
        $book->publication = $request->publication;
        $book->read_at = $request->read_at;
        $book->note = $request->note;
        // $book->image = $request->image;
        $book->save();
        DB::commit();
    },2);
    }catch(Throwable $e){
        Log::error($e);
        throw $e;
    }

        // 更新後はbookに戻る
        return redirect()
        ->route('book')
        ->with(['message' => '本の更新を完了しました。',
               'status' => 'info']);
    }
}
