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

    .card-outline {
        background: white;
        box-shadow: 0px 0px 12px 4px rgba(219, 115, 82, 0.75);
        -webkit-box-shadow: 0px 0px 12px 4px rgba(219, 115, 82, 0.75);
        -moz-box-shadow: 0px 0px 12px 4px rgba(219, 115, 82, 0.75);
        height: 20rem;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        &:hover {
            .images {
                transform: translateY(-4rem);
                filter: drop-shadow(0rem 1.5rem 2rem #db7352);
            }
        }
    }

    .images {
        transition: ease-out .45s;
    }
</style>

<div class="container">
    @foreach ($categories as $index => $cat)
        <div class="row mt-5">
            <h2 class="text-center">{{ $cat }}</h2>
        </div>

        <div class="row mt-2">
            @isset($fName[$index])
                @foreach ($fName[$index] as $innerIndex => $name)
                    <div class="col-3">
                        <a
                            href="{{ route('restaurant.item', [
                                'id' => $ids[$index][$innerIndex],
                                'name' => $fPhoto[$index][$innerIndex],
                            ]) }}">
                            <div class="card-outline p-3 mt-4" style="border-radius:2rem .6rem 2rem .6rem;">
                                <img src="{{ asset('restaurant_menu/' . $fPhoto[$index][$innerIndex]) . '.png' }}"
                                    class="text-center img-fluid images" alt="{{ $fPhoto[$index][$innerIndex] }}">
                                <div class="card-body .content">
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
            @endisset
        </div>
    @endforeach
</div>
