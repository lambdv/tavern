<style>
    input{
        background-color: gray;
        color: darkgray;
        padding: 10px;
    }
    textarea{
        background-color: gray;
        color: darkgray;
        padding: 10px;
    }
</style>

<x-homelayout>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <h1>Create a new Post</h1>
        <div>
            <label for="title">title</label>
            <input type="text" id="title" name="title" value="{{old('title')}}" required>
        </div>
        <div>
            <label for="body">body</label>
            <textarea type="text" id="body" name="body" required>{{old('body')}}</textarea>
        </div>
        <div>
            <label for="tavern_id">tavern</label>
            <select name="tavern_id" id="tavern_id" required>
                <option value="">select a tavern</option>
                @foreach ($taverns as $tavern)
                    <option value="{{$tavern->id}}" {{ $tavern->id == old('tavern_id') ? 'selected' : '' }}>
                        {{$tavern->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Post post</button>
        {{-- input validation --}}

        @if ($errors->any())
            <div class="bg-red-1">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</x-homelayout>
