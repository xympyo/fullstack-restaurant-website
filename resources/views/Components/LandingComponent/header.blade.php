<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .nav {
            border: 0;
            transition: ease-in-out 2s;

            &:hover {
                border-bottom: solid #211F20;
            }
        }
    </style>
</head>

<body>
    <header>
        <ul class="logo" style="list-style: none;">
            <li>
                <a href="{{ route('LandingIndex') }}">
                    <p>Cepi Cafe</p>
                </a>
            </li>
        </ul>
        <ul class="ms-auto d-flex flex-row" style="list-style: none;">
            <li><a class="nav" href="{{ route('LandingIndex') }}">Home</a></li>
            <li><a class="nav" href="{{ route('restaurant') }}">Menu</a></li>
            <li><a class="nav" href="{{ route('landing.team') }}">Team</a></li>
            <li><a class="nav" href="{{ route('landing.about') }}">About us</a></li>
        </ul>
    </header>
</body>

</html>
