<style>
    .moc-bg {
        background-color: #DBD3CD;
    }

    .price {
        background-color: #211F20;
        color: #DBD3CD;
        padding: 1rem;
        border-radius: 50%;
        position: absolute;
        bottom: 14rem;
        left: 14rem;
    }

    .card-c {
        transition: ease-in-out .25s;

        &:hover {
            filter: drop-shadow(0px 10px 5px #211F20);
            transform: translateY(-1rem);

            .food-img {
                transform: translateY(-.5rem);
            }

            .text {
                transform: translateY(.5rem);
            }
        }
    }

    .food-img {
        transition: ease-in-out .25s;
    }

    .text {
        transition: ease-in-out .25s;
    }

    .absolute {
        position: absolute;
    }

    .plate {
        animation: float ease-in-out infinite 10s;
        transition: ease-in-out;
    }

    .leaf1 {
        left: 1rem;
        top: 3rem;
        animation: float ease-in-out infinite 7s;
    }

    .leaf2 {
        left: 5rem;
        bottom: 2rem;
        animation: float infinite reverse 4s;
    }

    .leaf3 {
        right: 8rem;
        bottom: 1rem;
        animation: float reverse infinite 6s;
    }

    .leaf4 {
        right: -2rem;
        top: 1rem;
        animation: float ease-in-out infinite 4s;
    }

    @keyframes float {
        0% {
            transform: translateY(0rem);
        }

        50% {
            transform: translateY(1rem);
        }

        100% {
            transform: translateY(0rem);
        }
    }
</style>

<div class="container-fluid moc-bg">
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h1 class="text-center fw-bold mt-5">Our Special Dish</h1>
                <h4 class="text-center mt-3">Indulge further with our selection of signature dishes, each crafted with
                    care
                    to
                    tantalize your taste
                    buds and leave you craving for more.</h4>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row pb-5 mt-5 pt-5">
            @foreach ($fName as $index => $name)
                <div class="col-3 card-c">
                    <div class="card d-flex justify-content-center align-items-center"
                        style="height: 16rem; position: relative; border-radius:4rem .5rem 4rem .5rem">
                        <img src="{{ asset('restaurant_menu/' . $fPhoto[$index] . '.png') }}"
                            class="card-img-top img-fluid food-img" alt="{{ $fPhoto[$index] }}"
                            style="height: 12rem; padding:2rem; position: absolute; bottom:10rem">
                        <div class="card-body d-flex align-items-center flex-column justify-content-center">
                            <h2 class="card-title text-center text">{{ $fName[$index] }}</h2>
                            <p class="card-text text-center text">{{ $fDesc[$index] }}</p>
                        </div>
                        <div class="price">
                            <p>{{ $fPrice[$index] }}K</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-5 pb-5 d-flex align-items-center">
            <div class="col-6" style="position: relative">
                <img src="{{ asset('simpan/plate.png') }}" class="plate" alt="">
                <img src="{{ asset('simpan/leaf1.png') }}" class="absolute leaf1" alt="">
                <img src="{{ asset('simpan/leaf2.png') }}" class="absolute leaf2" alt="">
                <img src="{{ asset('simpan/leaf3.png') }}" class="absolute leaf3" alt="">
                <img src="{{ asset('simpan/leaf4.png') }}" class="absolute leaf4" alt="">
            </div>
            <div class="col-6">
                <h1 class="text-center">Our Menu</h1>
                <h5 class="text-center mt-4">Indulge in a world of delightful flavors at our cafe. <br />Simply tap the
                    menu
                    button and let your
                    taste buds journey through our tempting selections.</h5>
            </div>
        </div>
    </div>
</div>
