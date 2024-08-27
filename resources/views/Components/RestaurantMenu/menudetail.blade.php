<!-- Scripts -->
@vite(['resources/sass/bootstrap.scss', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cepi Cafe | @if (!empty($datas))
            {{ $datas[0]->f_name }}
        @else
            No menu item found
        @endif
    </title>
    <style>
        a {
            cursor: pointer;
        }

        .f-image {
            width: fit-content;
            animation: float 3s infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(1rem);
                filter: drop-shadow(0 0 0.75rem rgba(219, 115, 82, 0.75));
            }

            50% {
                transform: translateY(0rem);
                filter: drop-shadow(0 1rem 0.75rem rgba(219, 115, 82, 0.75));
            }

            100% {
                transform: translateY(1rem);
                filter: drop-shadow(0 0 0.75rem rgba(219, 115, 82, 0.75));
            }
        }

        .button {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body>
    @include('Components.LandingComponent.header')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-row">
                    <a href="{{ route('restaurant') }}" class="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>
                        <h5 class="lh-1 fw-bold ms-2">Menu</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-3 d-flex flex-row align-items-center">
            <div class="col-5 d-flex justify-content-center align-items-right">
                <img src="@if (!empty($datas)) {{ asset('restaurant_menu/' . $datas[0]->f_photo) . '.png' }} @else {{ asset('default-image.png') }} @endif"
                    class="f-image" alt="">
            </div>
            <div class="col-7">
                <h1 class="fw-bold">
                    @if (!empty($datas))
                        {{ $datas[0]->f_name }}
                    @else
                        No menu item found
                    @endif
                </h1>
                <h4 class="mt-3">
                    @if (!empty($datas))
                        {{ $datas[0]->f_description }}
                    @else
                        No description available
                    @endif
                </h4>
                <div class="row mt-5 d-flex flex-row align-items-center">
                    <div class="col-6 d-flex flex-row align-items-center">
                        <h4 class="secondary-text">Rp &nbsp</h4>
                        <h4 id="price">{{ $price }}</h4>
                    </div>
                    <div class="col-6 d-flex flex-row-reverse align-items-center">
                        <a>
                            <h2 class="ctrl-btn" onclick="increment()">+</h2>
                        </a>
                        <h2 class="me-3" id="qty">1</h2>
                        <a>
                            <h2 class="ctrl-btn me-3" onclick="decrement()">-</h2>
                        </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 d-flex flex-row">
                        @if (!empty($datas))
                            <form action="{{ route('restaurant.item.pass', ['ids' => $datas[0]->id]) }}" method="POST">
                                @csrf
                                @method('post')
                                <input type="hidden" id="final_qty" name="final_qty" value="1">
                                <button type="submit" class="btn-order">Add Order</button>
                            </form>
                        @else
                            <p>No data found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Components.LandingComponent.footer')
    @include('Components.RestaurantMenu.foodbar')
</body>

<script>
    var priceText = document.getElementById("price").textContent;
    var numericPart = priceText.replace(/[^\d]/g, ''); // Extract numeric part
    var price = parseInt(numericPart);

    var getQty = document.getElementById("qty");
    var qty = parseInt(getQty.textContent);

    function increment() {
        qty += 1;
        getQty.textContent = qty;
        var newPrice = price * qty;
        var formattedPrice = newPrice.toLocaleString('id-ID');
        document.getElementById("price").textContent = formattedPrice;
        document.getElementById("final_qty").value = qty;
    }

    function decrement() {
        qty -= 1;
        if (qty < 1) qty = 1;
        getQty.textContent = qty;
        var newPrice = price * qty;
        var formattedPrice = newPrice.toLocaleString('id-ID');
        document.getElementById("price").textContent = formattedPrice;
        document.getElementById("final_qty").value = qty;
    }
</script>


</html>
