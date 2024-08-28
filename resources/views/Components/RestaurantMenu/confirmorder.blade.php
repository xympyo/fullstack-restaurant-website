<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cepi Cafe | Confirm Order</title>
    <style>
        .content-container {
            box-shadow: 0px 0px 0.4rem .1rem rgba(0, 0, 0, 0.50);
            -webkit-box-shadow: 0px 0px 0.4rem .1rem rgba(0, 0, 0, 0.50);
            -moz-box-shadow: 0px 0px 0.4rem .1rem rgba(0, 0, 0, 0.50);

            border-radius: .3rem;
        }
    </style>
</head>

<body>
    @include('Components.LandingComponent.header')
    <div class="container">
        <div class="row">
            <div class="col-7">
                @foreach ($fQty as $index => $yes)
                    <div class="container mt-3 mb-3 p-3 content-container">
                        <div class="row d-flex flex-row align-items-center">
                            <div class="col-3">
                                <img class="img-fluid" src="{{ asset('restaurant_menu/' . $fPhoto[$index] . '.png') }}"
                                    alt="">
                            </div>
                            <div class="col-3">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="fw-bold">{{ $fName[$index] }}</h4>
                                    </div>
                                    <div class="row">
                                        <h5 class="fw-light">{{ $fCat[$index] }}</h5>
                                    </div>
                                    <div class="row">
                                        <a href="">
                                            <h6 style="text-decoration: underline">Delete</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="container d-flex flex-row align-items-center justify-content-center">
                                    <a href="">
                                        <img class="img-fluid" src="{{ asset('Icons/Add_ring.svg') }}" alt="Add Qty">
                                    </a>
                                    <h4>{{ $fQty[$index] }}</h4>
                                    <a href="">
                                        <img class="img-fluid" src="{{ asset('Icons/Remove.svg') }}" alt="Sub Qty">
                                    </a>
                                </div>
                            </div>
                            <div class="col-3">
                                <h3 class="fw-bold"><span>Rp. </span>{{ $fTot[$index] }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-5">
                <div class="content-container mt-3 mb-3 p-3">
                    <h2><span class="fw-bold">{{ $totalFood[0] }}</span> BARANG</h2>
                    <div class="container">
                        <hr>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-6 d-flex justify-content-start">
                            <p>Biaya Makanan</p>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <h5>{{ $subtotal }}</h5>
                        </div>
                    </div>
                    <div>
                        <a href="" class="button">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Components.LandingComponent.footer')
</body>

</html>
