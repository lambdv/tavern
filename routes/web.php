<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TavernController;
use App\Models\Tavern;

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/post/{id}', [PostController::class,'show'])->name('post');
Route::get('/create', [PostController::class,'create'])->name('create');
Route::get('/taverns', [TavernController::class, 'taverns'])->name('taverns');
Route::get('/tavern/{id}', function ($id){
    $tavern = Tavern::findOrFail($id);
    return view('home.tavern', ["tavern" => $tavern]);
})->name('tavern');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Route::delete('/post/{id}', [PostController::class,'destroy'])->name('posts.destroy');
Route::delete('/post/{post}', [PostController::class,'destroy'])->name('posts.destroy');
