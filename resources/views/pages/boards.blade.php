
<x-layouts.root title="Tavern">
    <h2 class="font-bold text-4xl">boards</h2>
    <div class="grid grid-cols-4 wrap">
        @foreach ($boards as $board)
            <a href="/boards/{{ str_replace(' ', '', $board->name)  }}">
                <div class="block p-2 rounded-xs m-1 bg-gray-800 border-amber-400 ">
                    <h1>
                        {{$board->name}}
                    </h1>
                </div>
            </a>
        @endforeach
    </div>
</x-layouts.root>
