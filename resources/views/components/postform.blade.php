@php
    $style = "bg-gray-900 p-2 pl-5 pr-5 m-2 rounded-xs outline-none";
@endphp

<div class="{{ $class ?? '' }}">
        <form action="
            {{ url('/posts') }}
        " class="grid bg-blue-900" method="POST">
            @csrf

            <input name="title" type="text" class= "{{ $style }}"  placeholder="Title">
            <textarea name="body" class="{{ $style }}" placeholder="Content"></textarea>
            <div class="text-right">
                <button type="submit" class="bg-blue-600 m-2 rounded-xs w-auto p-1 pl-2 pr-2">post</button>
            </div>
        </form>
</div>