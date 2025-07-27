<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Support\Collection;
use App\Models\Board;
use Illuminate\Support\Facades\DB;
use App\Models\Thread;
new #[Layout('components.layouts.auth')] 
class extends Component {
    
    public string $title = '';
    public string $body = '';
    public string $boardName = '';
    public $board = null;

    public function mount($board) {
        $this->board = $board;
    }

    public function postThread() {

        $thread = Thread::create([
            'title' => $this->title,
            'body' => $this->body,
            'board_id' => $this->board->id,
            'user_id' => Auth::user()->id
        ]);

        $this->redirectIntended(default: route('boards.view', ['name' => $this->board->name], absolute: false), navigate: true);
        
    }



//    public string $password = '';
//
//    /**
//     * Confirm the current user's password.
//     */
//    public function confirmPassword(): void
//    {
//        $this->validate([
//            'password' => ['required', 'string'],
//        ]);
//
//        if (! Auth::guard('web')->validate([
//            'email' => Auth::user()->email,
//            'password' => $this->password,
//        ])) {
//            throw ValidationException::withMessages([
//                'password' => __('auth.password'),
//            ]);
//        }
//
//        session(['auth.password_confirmed_at' => time()]);
//
//        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
//    }
}; ?>



<div>
    {{ $board }}
    @if(Auth::check())
        <div class="flex flex-col gap-6 mr-auto ml-auto w-1/2 bg-[#323232] p-5 rounded-xs">
            <p>Create Thread on {{ $board->name }}</p>
            <form wire:submit="postThread" >
                <flux:input
                wire:model="Title"
                    type="text"
                    :placeholder="__('Title')"
            />

            <flux:textarea
                wire:model="body"
                :placeholder="__('Body')"
                rows="4"
            />
            <flux:button variant="primary" type="submit" class="w-full cursor-pointer">{{ __('Confirm') }}</flux:button>
            </form>
        </div>
    @else<span>Login to post a thread</span>@endif
</div>


{{--<div class="flex flex-col gap-6">--}}
{{--    <x-auth-header--}}
{{--        :title="__('Confirm password')"--}}
{{--        :description="__('This is a secure area of the application. Please confirm your password before continuing.')"--}}
{{--    />--}}

{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="text-center" :status="session('status')" />--}}

{{--    <form wire:submit="confirmPassword" class="flex flex-col gap-6">--}}
{{--        <!-- Password -->--}}
{{--        <flux:input--}}
{{--            wire:model="password"--}}
{{--            :label="__('Password')"--}}
{{--            type="password"--}}
{{--            required--}}
{{--            autocomplete="new-password"--}}
{{--            :placeholder="__('Password')"--}}
{{--            viewable--}}
{{--        />--}}

{{--        <flux:button variant="primary" type="submit" class="w-full">{{ __('Confirm') }}</flux:button>--}}
{{--    </form>--}}
{{--</div>--}}
