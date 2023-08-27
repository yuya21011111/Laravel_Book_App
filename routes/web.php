<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GuestLoginController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('book')->group(function () {
    Route::get('/',[BookController::class,'index'])->name('book');
    Route::get('/create',[BookController::class,'create'])->name('book.create');
    Route::post('/store',[BookController::class,'store'])->name('book.store');
    Route::get('/show/{book}',[BookController::class,'show'])->name('book.show');
    Route::get('/edit/{book}',[BookController::class,'edit'])->name('book.edit');
    Route::post('/update/{book}',[BookController::class,'update'])->name('book.update');
    Route::delete('/destroy/{book}',[BookController::class,'destroy'])->name('book.destroy');
});

// ゲストログイン機能
Route::get('/guest-login', [GuestLoginController::class, 'guest'])->name('guestLogin');
Route::post('/guest-login', [GuestLoginController::class, 'guest'])->name('guestLogin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
