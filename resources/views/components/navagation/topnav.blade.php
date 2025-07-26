<nav class="flex width-full bg-gray-500 text-white text-center">
    <div class="">
        <a href="{{ route('index') }}" class="text-lg font-bold">Tavern</a>
    </div>
    <div class="ml-auto mr-0">
        <div id="link" class="flex gap-4">
            <a href="{{ route('index') }}">Home</a>
            <a href="{{ route('boards') }}">boards</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ route('profile') }}">
{{--                        {{auth()->user()}}--}}
                        <flux:profile
                            :initials="auth()->user()->initials()"
                        />
                    </a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            @endif
        </div>
    </div>
</nav>
