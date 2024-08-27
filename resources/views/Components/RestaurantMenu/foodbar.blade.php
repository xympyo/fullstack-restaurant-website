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

            .content-container {
                display: flex;
                justify-content: right;
                align-items: center;
            }

            .img-container {
                position: relative;

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
    <div class="container-fluid bar-container">
        <div class="container content-container">
            <h2>Items :</h2>
            <div class="img-container">
                <img src="{{ asset('Icons/Bag@2x.png') }}" alt="Bag Icon">
                <h2 class="counter">1</h2>
            </div>
        </div>
    </div>
</body>

</html>
