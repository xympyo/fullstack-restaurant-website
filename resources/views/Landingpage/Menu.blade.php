<!-- google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300..900&display=swap" rel="stylesheet">
<!-- style font -->
<style>
    .menuText {
        font-family: "Frank Ruhl Libre", serif;
    }

    .container-card-border {
        height: 20rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: ease-out s;

        &:hover {
            .card-content {
                transform: translateY(-4rem);
            }

            height: 16rem;
        }
    }

    .card-content {
        transition: ease-out 1s;
    }

    .dish-container {
        position: relative;
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
                    <div class="col-3">
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
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-6">
                        <img src="{{ asset('simpan/plate.png') }}" alt="">
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <div class="d-flex flex-column">
                            <h1>Our Menu</h1>
                            <h4 class="mt-3">Indulge in a world of delightful flavors at our cafe, simply tap the menu
                                button and let
                                your taste buds journey through our tempting sections</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
