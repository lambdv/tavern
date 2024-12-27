@php
    use App\Models\Tavern;
@endphp

<x-homelayout>
    @if (session('success'))
        {{session('success')}}
    @endif

    <ul>
    @foreach ($posts as $post)
        <li>
            <x-card href="post/{{$post['id']}}" :trending="$post['id']==1">
                {{-- /{{Tavern::find($post->tavern_id)->name}}/  --}}
                <h3> {{$post->tavern->name}} :: {{$post["title"]}}</h3>
                <p>{{$post['body']}}</p>
            </x-card>
        </li>
    @endforeach
    </ul>

    <div>
        {{ $posts->links() }}
    </div>
</x-homelayout>
