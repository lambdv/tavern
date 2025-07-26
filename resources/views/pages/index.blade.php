<?php 
use App\Models\Board;
use App\Models\Thread;
use App\Models\User;

use App\Models\Comment;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

$latestPosts = DB::table('threads')

    ->join('boards', 'threads.board_id', '=', 'boards.id')
    ->orderByDesc('threads.created_at')
    ->select([
        'threads.id as thread_id',
        'threads.title',
        'threads.body',
        'threads.created_at',
        'boards.name as board_name',
        'boards.id as board_id'
    ])
    ->limit(5)->get();
?>

<x-layouts.root title="Tavern">           


    <h1 class="text-xl text-white font-bold ml-auto mr-auto text-center">Welcome to the tavern!</h1>

    @foreach ($latestPosts as $post)
        <a href="/boards/{{ $post ->board_name }}/{{ $post ->thread_id }}">
            <div class="p-5 m-2 bg-gray-800">
                <h1>{{ $post ->title}}</h1>
                <p>{{ $post->body }}</p>
            </div>
        </a>
    @endforeach

</x-layouts.root>
