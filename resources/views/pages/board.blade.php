

<x-layouts.root title=" {{$board->name}} | Tavern">

    <livewire:thread.post-form :board=$board />

    <div>
        <h1 class="text-xl text-bold">{{$board->name}}</h1>
        @foreach($threads as $thread)
            <a href="/boards/{{str_replace(' ','',$board->name)}}/{{$thread->id}}">
                <div class="card p-2 rounded-xs border border-gray-700 block">
                    <h2>
                        {{$thread->title}}
                    </h2>
                    <p>
                        {{$thread->body}}
                    </p>

                    @if (Auth::user()->id == $thread->user_id)
                        <button >Delete</button>
                    @endif
                </div>
            </a>

        @endforeach
    </div>
</x-layouts.root>
