<?php
use App\Http\Controllers\BoardController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use function Livewire\Volt\js;

Route::middleware(['auth'])->group(function () {
     Route::redirect('settings', 'settings/profile');
     Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
     Volt::route('settings/password', 'settings.password')->name('settings.password');
     Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
 });

 require __DIR__.'/auth.php';


Route::view('profile', 'pages.profile')
     ->middleware(['auth', 'verified'])
     ->name('profile');


Route::get('/', function () {
     return view('pages.index');
})->name('index');



Route::get('/boards', function () {
     return app(BoardController::class)->boardsView();
})->name('boards');

Route::get('/boards/{name}', function ($name) {
    return app(BoardController::class)->boardView($name);
})->name('boards.view');

Volt::route('/boards/{boardName}/{threadId}', 'pages.thread')->name('thread.view');
