<!-- Scripts -->
@vite(['resources/sass/bootstrap.scss', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cepi Cafe | Customer {{ $id }}</title>
    <style>
    </style>
</head>

<body>
    @include('Components.LandingComponent.header')
    <form action="" method="post">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-7"></div>
            <div class="col-5">

            </div>
        </div>
    </form>
    @include('Components.LandingComponent.footer')
</body>



</html>