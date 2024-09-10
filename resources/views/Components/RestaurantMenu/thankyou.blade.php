<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cepi's Cafe | Thank You!</title>
    <style>
        .primary-btn {
            padding: 0.4rem 0.8rem 0.4rem 0.8rem;
            border-radius: .4rem;
            box-shadow: 0px 0.2rem 5px 0px rgba(0, 0, 0, 0.75);
            -webkit-box-shadow: 0px 0.2rem 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0.2rem 5px 0px rgba(0, 0, 0, 0.75);
            font-weight: 800;
            color: #DB7352;
            border: 0;
        }
    </style>
</head>

<body>
    @include('Components.LandingComponent.header')
    <div style="height: 100vh" class="container d-flex justify-content-center align-items-center flex-column">
        <h1 class="fw-bold">Thank you for your order!</h1>
        <a href=" {{ route('restaurant') }} " class="primary-btn mt-5">
            <h2 class="fw-bold">Go Back</h2>
        </a>
    </div>
    @include('Components.LandingComponent.footer')
</body>

</html>
