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
                                    <a onclick="subItem({{ $index }})" id="sub-{{ $index }}">
                                        <img class="img-fluid" src="{{ asset('Icons/Remove.svg') }}" alt="Add Qty">
                                    </a>
                                    <h4 class="ms-2 me-2" id="qty-{{ $index }}">{{ $fQty[$index] }}</h4>
                                    <a onclick="addItem({{ $index }})" style="pointer-events: auto">
                                        <img class="img-fluid" src="{{ asset('Icons/Add_ring.svg') }}" alt="Sub Qty">
                                    </a>
                                </div>
                            </div>
                            <div class="col-3 d-flex flex-row align-items-center">
                                <h4>Rp. </h4>
                                <h3 class="fw-bold" id="total-{{ $index }}">{{ $fTot[$index] }}
                                </h3>
                                <h4>k</h4>
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
                            <h5 id="subtotal">Rp. {{ $subtotal }} k</h5>
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

    <script>
        function addItem(index) {
            var qtyElement = document.getElementById('qty-' + index);
            var qty = parseInt(qtyElement.textContent);
            qtyElement.textContent = qty + 1;

            updateTotal(index, qty + 1);
        }

        function subItem(index) {
            var qtyElement = document.getElementById('qty-' + index);
            var button = document.getElementById('sub-' + index);
            var qty = parseInt(qtyElement.textContent);
            if (qty == 0) {
                button.style.color = "gray";
            } else {
                qtyElement.textContent = qty - 1;
                updateTotal(index, qty - 1);
            }
        }

        function formatRupiah(amount) {
            if (amount >= 100000) {
                return (amount / 1000).toFixed(0);
            } else if (amount >= 10000) {
                return (amount / 1000).toFixed(1);
            } else {
                return (amount / 1000).toFixed(2);
            }
        }

        function updateTotal(index, qty) {
            var priceElement = document.getElementById('total-' + index);
            var price = @json($fPrice);
            console.log(price[index]);

            var yes = price[index] * qty;

            priceElement.textContent = formatRupiah(yes);
        }

        
    </script>
</body>

</html>
