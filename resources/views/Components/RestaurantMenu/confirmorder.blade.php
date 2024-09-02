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

        .primary-btn {
            padding: 0.4rem 0.8rem 0.4rem 0.8rem;
            border-radius: .4rem;
            box-shadow: 0px 0.2rem 5px 0px rgba(0, 0, 0, 0.75);
            -webkit-box-shadow: 0px 0.2rem 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0.2rem 5px 0px rgba(0, 0, 0, 0.75);
            font-weight: 800;
            color: #DB7352;
        }

        .glass-css {
            background: white;
            border-radius: 16px;
            box-shadow: 0px 0.2rem 5px 0px rgba(0, 0, 0, 0.75);
            -webkit-box-shadow: 0px 0.2rem 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0.2rem 5px 0px rgba(0, 0, 0, 0.75);
        }

        .yes {
            position: relative;
        }

        .confirmation-page {
            position: absolute;
            top: -34rem;
            display: none;
            /* top: 120%;
            left: 50%;
            transform: translate(-50%, -90%); */
        }
    </style>
</head>

<body>
    @include('Components.LandingComponent.header')
    <div class="container yes">
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
                    <div class="d-flex justify-content-center mt-5">
                        <a onclick="showDisplay()" class="primary-btn" style="cursor: pointer;">Order Now</a>
                    </div>
                </div>
            </div>
        </div>


        {{-- confirmation page --}}
        <div class="container confirmation-page" id="confirm_page">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 d-flex p-4 flex-column align-items-center rounded-2 glass-css">
                    <div class="d-flex justify-content-end ms-auto">
                        <a style="cursor: pointer;" onclick="removeDisplay()" class="ms-auto">
                            <h2 class="fw-bolder">x</h2>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h1 class="text-center">Order Summary</h1>
                    </div>
                    <div class="row d-flex align-items-center">
                        @foreach ($fQty as $index => $yes)
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <h3 class="text-start">{{ $fName[$index] }}</h3>
                                    <h5 class="text-start mt-2" id="qtys-{{ $index }}">{{ $fQty[$index] }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-6 d-flex flex-row justify-content-end">
                                <h4>Rp. </h4>
                                <h3 class="fw-bold" id="totals-{{ $index }}">{{ $fTot[$index] }}
                                </h3>
                                <h4>k</h4>
                            </div>
                        @endforeach
                        <hr / class="mt-3">
                        <div class="container-fluid mt-3 d-flex flex-row justify-content-between">
                            <h4>Total</h4>
                            <div class="d-flex flex-row">
                                <h4>Rp.</h4>
                                <h3 class="fw-bold" id="subtotals">{{ $subtotal }}</h3>
                                <h4>k</h4>
                            </div>
                        </div>
                        <hr / class="mt-2">
                        <form action="" method="post">
                            @csrf
                            @method('post')
                            @foreach ($fQty as $index => $yes)
                                <input type="hidden" name="fId" id="fId-{{ $index }}"
                                    value={{ $fId[$index] }}>
                                <input type="hidden" name="fQty" id="fQty-{{ $index }}" value="">
                            @endforeach
                            <div class="d-flex justify-content-center">
                                <a class="primary-btn" onclick="updateQty()">Confirm Order</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
    @include('Components.LandingComponent.footer')

    <script>
        function removeDisplay() {
            var display = document.getElementById('confirm_page');
            display.style.display = "none";
        }

        function showDisplay() {
            var display = document.getElementById('confirm_page');
            display.style.display = "block";
        }

        function updateQty() {
            @foreach ($fQty as $index => $yes)
                var qtyValue = document.getElementById('qty-{{ $index }}');
                var qtyInput = document.getElementById('fQty-{{ $index }}');
                var qty = parseInt(qtyValue.textContent);
                qtyInput.value = qty;
                console.log(qtyInput);
            @endforeach
        }

        function addItem(index) {
            var qtyElement = document.getElementById('qty-' + index);
            var qty = parseInt(qtyElement.textContent);
            qtyElement.textContent = qty + 1;

            ///confirmation page
            var qtysElement = document.getElementById('qtys-' + index);
            var qtys = parseInt(qtysElement.textContent);
            qtysElement.textContent = qty + 1;

            updateTotal(index, qty + 1);
            updateSubtotal();
        }

        function subItem(index) {
            var qtyElement = document.getElementById('qty-' + index);
            var button = document.getElementById('sub-' + index);
            var qty = parseInt(qtyElement.textContent);

            ///confirmation page
            var qtysElement = document.getElementById('qtys-' + index);
            var qtys = parseInt(qtysElement.textContent);

            if (qty > 0) {
                qtyElement.textContent = qty - 1;
                qtysElement.textContent = qty - 1;
                updateTotal(index, qty - 1);
                updateSubtotal();
            } else {
                button.style.color = "gray";
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
            var totalElement = document.getElementById('totals-' + index);
            var price = @json($fPrice);

            var total = price[index] * qty;
            priceElement.textContent = formatRupiah(total);
            totalElement.textContent = formatRupiah(total);
        }

        function updateSubtotal() {
            var subtotal = 0;
            var prices = @json($fPrice);

            @foreach ($fQty as $index => $yes)
                var qty = parseInt(document.getElementById('qty-{{ $index }}').textContent);
                subtotal += prices[{{ $index }}] * qty;
            @endforeach

            var subtotalElement = document.getElementById('subtotal');
            subtotalElement.textContent = "Rp. " + formatRupiah(subtotal) + " k";

            // confirmation pop up
            var subtotalsElement = document.getElementById('subtotals');
            subtotalsElement.textContent = formatRupiah(subtotal);
        }
    </script>

</body>

</html>
