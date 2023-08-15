<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Services\ImageService;

class BookController extends Controller
{
    public function index() {
        // トップ画面
        $books = Book::paginate(10);
        return view('book.index',compact('books'));
    }

    public function create() {
        // 新規作成

        return view('book.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string'],
            'status' => ['required', 'string'],
            'author' => ['nullable','string'],
            'publication' => ['nullable','string'],
            'read_at' => ['nullable','date'],
            'note' => ['nullable','string','max:200'],
        ]);
        $imageFails = $request->file('files');
        if(!is_null($imageFails)){
            foreach($imageFails as $imageFail) {
                $fileNameToStore = ImageService::upload($imageFail,'images');
                Book::create([
                    'name' => $request->name,
                    'status' => $request->status,
                    'author' => $request->author,
                    'publication' => $request->publication,
                    'read_at' => $request->read_at,
                    'note' => $request->note,
                    'filename' => $fileNameToStore,
                ]);
            }
        }
        return redirect()
        ->route('book')
        ->with(['message' => '新規作成を行いました。',
               'status' => 'info']);
        
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
        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()){
            $fileNameToStore = ImageService::upload($imageFile,'images');
             $book->filename = $fileNameToStore;
        }
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

    public function destroy($id) {
        Book::findOrFail($id)->delete(); // デリート処理
        return redirect()
         ->route('book')
         ->with(['message' => '本の情報を削除しました。', // status alertでtoastrを赤くする
         'status' => 'alert']);

    }
}
