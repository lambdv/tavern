<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
<style>
    body{
        background-color: black;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        color: gainsboro;
    }

</style>
<body>
    <header>
        <nav>
            <h1>tavern</h1>
            <a href="{{route('index')}}">home</a>
            <a href="{{route('create')}}">create</a>
            <a href="{{route('taverns')}}">taverns</a>

        </nav>
    </header>
    <main>
        {{ $slot }}
    </main>
</body>
</html>