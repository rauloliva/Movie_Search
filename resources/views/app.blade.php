<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieSearch - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Josefin+Sans&display=swap" rel="stylesheet">    
</head>
<body>

    <div class="connection">You are Disconnected</div>

    <header class="header">
        <span class="header__title" onclick="nuevaVentana()">MovieSearch</span>
    </header>
    
    @yield('content')

    <footer class="footer">
        <p>
            &copy; Copyright 2020 by Raul Oliva
        </p>
        <p>
            Feel free to use this project for your own purposes. This does NOT apply if you plan to produce your own course or tutorials basde on this project
        </p>
    </footer>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/assets.js')}}"></script>
</html>