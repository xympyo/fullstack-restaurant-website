<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <ul class="logo" style="list-style: none;">
            <li>
                <a href="{{ route('LandingIndex') }}">
                    <img src="{{ asset('simpan/logo.png') }}" width="30px" height="30px">
                </a>
            </li>
        </ul>
        <ul class="menu" style="list-style: none;">
            <li><a href="{{ route('LandingIndex') }}#home">Home</a></li>
            <li><a href="{{ route('LandingIndex') }}#menu">Menu</a></li>
            <li><a href="{{ route('LandingIndex') }}#team">Team</a></li>
            <li><a href="{{ route('LandingIndex') }}#about">About us</a></li>
        </ul>
        <ul class="right" style="list-style: none;">
            <li>
                <button class="order-button" onclick="window.location.href='{{ route('LandingIndex') }}'">Order Now</button>
            </li>
        </ul>
    </header> 
    
    <main>
        {{ $slot}}
    </main>
</body>
</html>
