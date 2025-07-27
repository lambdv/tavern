<?php

use App\Models\Board;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.root')] class extends Component {
    public $title = '';
    public $body = '';
    public $board;

    public function mount($boardName = null) {
        if ($boardName) {
            $this->board = Board::where('name', $boardName)->first();
        }
    }

    public function createThread() {
        $this->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:10',
        ]);

        $thread = Thread::create([
            'title' => $this->title,
            'body' => $this->body,
            'board_id' => $this->board->id,
            'user_id' => Auth::id(),
        ]);

        $this->reset(['title', 'body']);
        
        // Redirect to the new thread
        return redirect()->route('thread.view', [
            'boardName' => $this->board->name,
            'threadId' => $thread->id
        ]);
    }
}; ?>

<div class="bg-gray-800 p-4 rounded-lg mb-4">
    <h2 class="text-lg font-semibold mb-4">Create New Thread</h2>
    
    <form wire:submit="createThread" class="space-y-4">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title</label>
            <input 
                type="text" 
                id="title"
                wire:model="title" 
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Enter thread title..."
                required
            >
            @error('title') 
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="body" class="block text-sm font-medium text-gray-300 mb-2">Content</label>
            <textarea 
                id="body"
                wire:model="body" 
                rows="4"
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Enter your post content..."
                required
            ></textarea>
            @error('body') 
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button 
            type="submit" 
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800"
        >
            Create Thread
        </button>
    </form>
</div>
