<style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        pointer-events: none;
    }

    .menu-card {
        filter: drop-shadow(5px 10px 10px #DB7352);
        height: 24rem;
        transition: ease-in-out .25s;

        &:hover {
            .menu-img {
                transform: translateY(-4rem);
            }

            transform: translateY(1rem);
            margin-bottom:1rem;
        }

        .menu-img {
            transition: ease-out .175s;
        }
    }
</style>

<div class="container">
    @foreach ($categories as $index => $cat)
        <div class="row mt-5">
            <h2 class="text-center">{{ $cat }}</h2>
        </div>

        <div class="row mt-2">
            @foreach ($fName[$index] as $innerIndex => $name)
                <div class="col-3">
                    <a
                        href="{{ route('restaurant.item', [
                            'id' => $ids[$index][$innerIndex],
                            'name' => $fPhoto[$index][$innerIndex],
                        ]) }}">
                        <div class="card-outline p-3 mt-4 menu-card">
                            <img src="{{ asset('restaurant_menu/' . $fPhoto[$index][$innerIndex]) . '.png' }}"
                                class="text-center img-fluid menu-img" alt="{{ $fPhoto[$index][$innerIndex] }}">
                            <div class="card-body">
                                <h5 class="card-title mt-2">{{ $name }}</h5>
                                <p class="card-text fw-light">{{ $fDesc[$index][$innerIndex] }}</p>
                                <div class="row d-flex align-items-center mt-3">
                                    <p class="card-text"><span class="secondary-text">Rp
                                        </span>{{ $fPrice[$index][$innerIndex] }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
