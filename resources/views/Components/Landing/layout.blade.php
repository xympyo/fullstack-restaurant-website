<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title ?? 'default title' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <ul class="logo" style="list-style: none;">
            <li>
                <a href="{{ route('Landingpage.index') }}">
                    <img src="{{ asset('simpan/logo.png') }}" width="80px" height="80px">
                </a>
            </li>
        </ul>
        <ul class="menu" style="list-style: none;">
            <li><a href="{{ route('Landingpage.index') }}">Home</a></li>
            <li><a href="{{ route('Landingpage.index') }}">Menu</a></li>
            <li><a href="{{ route('Landingpage.index') }}">Team</a></li>
            <li><a href="{{ route('Landingpage.index') }}">About us</a></li>
        </ul>
        <ul class="right" style="list-style: none;">
            <li>
                <button class="order-button" onclick="window.location.href='{{ route('Landingpage.index') }}'">Order Now</button>
            </li>
        </ul>
    </header>

    <main>
        {{ $slot}}
    </main>
</body>

</html>