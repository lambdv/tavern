<x-homelayout>
    <h1>${{$tavern->name}}</h1>
    @foreach ($tavern->posts as $post)
        <x-card href="/post/{{$post->id}}" :trending="$post['id']==1">
            <h3>{{$post["title"]}}</h3>
            <p>{{$post['body']}}</p>
        </x-card>
    @endforeach
</x-homelayout>
