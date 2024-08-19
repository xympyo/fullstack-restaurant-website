<!-- google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300..900&display=swap" rel="stylesheet">
<!-- style font -->
<style>
    body {
        overflow-x: hidden
    }

    .menuText {
        font-family: "Frank Ruhl Libre", serif;
    }

    .wrapper {
        .container-card-border {
            height: 20rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: ease-out .5s;
        }

        &:hover {
            .card-content {
                transform: translateY(-4rem);
            }

            .container-card-border {
                height: 16rem;
            }

            .food-image {
                filter: drop-shadow(0 0 0.75rem rgba(219, 115, 82, 0.75));
            }
        }
    }

    .food-image {
        transition: ease-out 1s;
    }

    .card-content {
        transition: ease-out 1s;
        pointer-events: none;
    }

    .dish-container {
        position: relative;

        .img1 {
            position: absolute;
            right: -24rem;
        }
    }

    .plate-container {
        position: relative;
        transition: ease-out .5s;

        &:hover {
            transform: scale(105%);

            .leafs {
                z-index: -1;
                filter: blur(1rem);
            }
        }
    }

    .leafs {
        position: absolute;
        transition: ease-out .3s;
    }

    @keyframes float {
        0% {
            transform: translateY(0rem)
        }

        50% {
            transform: translateY(1rem);
        }

        100% {
            transform: translateY(0rem);
        }
    }

    .leaf1 {
        right: 0rem;
        animation: float 2s infinite reverse;
    }

    .leaf2 {
        left: 0rem;
        top: 2rem;
        animation: float 2s infinite;
    }

    .leaf3 {
        left: 2rem;
        bottom: 1rem;
        animation: float 2s infinite reverse;
    }

    .leaf4 {
        bottom: 0rem;
        right: 3rem;
        animation: float 2s infinite;
    }

    .menu-container {
        position: relative;
    }

    .backgrounds {
        width: min-content;
        position: absolute;
    }

    .background1 {
        left: 0rem;
        top: 2rem;
    }

    .background2 {
        right: -4rem;
        bottom: 0rem;
    }

    .background3 {
        left: 0rem;
        bottom: 8rem;
    }
</style>
<!-- css -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<section id="menu">
    <div class="content-home">
        <div class="Home-2">
            <div class="row">
                <div class="desc2">
                    <h1>
                        Our Special Dish<br>
                    </h1>
                    <p>Indulge further with our selection of signature dishes, <br>
                        each crafted with care to tantalize your taste buds and <br>
                        leave you craving for more.
                    </p>
                </div>
            </div>

            <div class="row mt-3 dish-container">
                @foreach ($fName as $index => $data)
                    <div class="col-3 wrapper">
                        <div class="card card-width" style="border-radius: 4rem .5rem 4rem .5rem; position: relative;">
                            <div class="container-card-border">
                                <div class="card-body card-content">
                                    <img src="{{ asset('restaurant_menu/' . $fPhoto[$index]) . '.png' }}" alt=""
                                        class="food-image image-fluid">
                                    <h5 class="card-title menuText text-center">{{ $fName[$index] }}</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary menuText text-center">
                                        {{ $fCategory[$index] }}</h6>
                                    <p class="card-text menuText text-center">{{ $fDesc[$index] }}</p>
                                    <h2 class="text-center menuText">{{ $fPrice[$index] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <img class="img1" src="{{ asset('simpan/background1.png') }}" style="width: min-content"
                    alt="">
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-6 plate-container">
                        <img class="plate" src="{{ asset('simpan/plate.png') }}" alt="">
                        <img class="leafs leaf1" src="{{ asset('simpan/leaf1.png') }}" alt="">
                        <img class="leafs leaf2" src="{{ asset('simpan/leaf2.png') }}" alt="">
                        <img class="leafs leaf3" src="{{ asset('simpan/leaf3.png') }}" alt="">
                        <img class="leafs leaf4" src="{{ asset('simpan/leaf4.png') }}" alt="">
                    </div>
                    <div class="col-6 d-flex align-items-center menu-container">
                        <div class="d-flex flex-column">
                            <h1>Our Menu</h1>
                            <h4 class="mt-3">Indulge in a world of delightful flavors at our cafe, simply tap the menu
                                button and let
                                your taste buds journey through our tempting sections</h4>
                            <img class="backgrounds background1" src="{{ asset('simpan/background2.png') }}"
                                alt="">
                            <img class="backgrounds background2" src="{{ asset('simpan/background3.png') }}"
                                alt="">
                            <img class="backgrounds background3"src="{{ asset('simpan/background4.png') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
