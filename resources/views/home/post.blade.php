<x-homelayout>
    <h1 class="h1">{{$post->title}} || {{$post->tavern->name}}</h1>
    <h3 class="h3">posted by: {{$post->user_id}} at {{$post->created_at}}</h3>
    <p class="p">{{$post->body}}</p>


    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
        @csrf
        @method('DELETE') 

        <button type="submit">delete post</button>
    </form>
</x-homelayout>
