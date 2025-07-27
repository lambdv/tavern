<?php

use App\Models\Board;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use App\Models\Comment;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new
#[Layout('components.layouts.root')]
class extends Component {
    public $board;
    public $thread;
    public $comments;
    public $op;
    public function mount($boardName, $threadId){
        //Log::info('test');
        $this->board = Board::where('name', $boardName)->firstOrFail();
        $this->thread = Thread::where('board_id', $this->board->id)
            ->where('id', $threadId)
            ->firstOrFail();
        $this->op = User::where('id', $this->thread->user_id)->firstOrFail();
        $this->comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('thread_id', $this->thread->id)
            ->get();
    }
}; ?>

<div>
    <title>{{$thread -> title}}</title>
    <div class="p-5 m-2 bg-gray-900" id="post">
        <h1 class="text-2xl font-bold">{{$this->thread->title}}</h1>
        <p class="">{{$this->thread->body}}</p>
        <p class="text-xs text-gray-300">author: {{ $op->name }}</p>
    </div>

    <div id="comments">
        @foreach($this->comments as $comment)
            <div class="p-5 m-2 bg-amber-950" id="post">
                {{$comment->body}}
                <p class="text-red-500">{{$comment->name}}</p>
            </div>
        @endforeach
    </div>
</div>

