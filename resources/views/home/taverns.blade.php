<x-homelayout>
    <h1>taverns</h1>
    @foreach ($taverns as $tavern)
        <li>
            <a href="tavern/{{$tavern->id}}">{{$tavern->name}}</a>
        </li>
    @endforeach
</x-homelayout>
