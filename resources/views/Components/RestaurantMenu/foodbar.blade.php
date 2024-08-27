<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bar-container {
            position: sticky;
            bottom: 0;
            background: #DB7352;
            display: none;

            .content-container {
                display: flex;
                justify-content: right;
                align-items: center;
                transition: ease-out .25s;
                padding: 0.5rem 0rem 0.5rem 0rem;

                &:hover {
                    filter: drop-shadow(0px 5px 10px white);
                }
            }

            .img-container {
                position: relative;

                .img {
                    filter: blur(.2rem);
                }

                .counter {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    color: white;
                }
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid bar-container" id="bar-container">
        <div class="container content-container">
            <a href="" class="hover">
                <h2>Items :</h2>
                <div class="img-container">
                    <img class="img" src="{{ asset('Icons/Bag@2x.png') }}" alt="Bag Icon">
                    <h2 class="counter">{{ $counter }}</h2>
            </a>
        </div>
    </div>
    </div>
</body>

<script>
    var counter = @json($counter);
    if (counter != 0) {
        var container = document.getElementById("bar-container");
        container.style.display = "block";
    }
</script>

</html>
