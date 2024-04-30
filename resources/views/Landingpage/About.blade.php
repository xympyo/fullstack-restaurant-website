<!DOCTYPE html>
<html>

<head>
    <title>Cepi Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <style>
        .container-banget {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        #image {
            flex-basis: 40%;
            height: 80%;
            background-image: url('{{ asset('simpan/fotocafe.png') }}');
            background-size: cover;
            background-position: center;
            border-radius: 10px;
        }

        #about {
            flex-basis: 40%;
            padding: 20px;
        }

        #about h1 {
            font-size: 60px;
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
        }

        #about p {
            text-align: justify;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    @include('Components.LandingComponent.header')
    <div class="container-banget">

        <div id="image"></div>
        <div id="about">
            <h1>About Us</h1>
            <p>Cepi Cafe is a place filled with inviting warmth and ambiance. Upon entering, you're greeted by the
                tantalizing aroma of freshly brewed coffee and a friendly atmosphere. Inside, you'll find a wide array
                of
                high-quality coffee selections from around the world, ranging from rich and aromatic espressos to
                carefully
                crafted pour-over brews.<br><br>
                At Cepi Cafe, we believe that coffee is more than just a beverage, it's an
                experience. Our passion for coffee drives us to source only the finest beans,
                ensuring each cup is a perfect balance of flavor and freshness. Whether you're
                a seasoned coffee enthusiast or simply looking for a comforting cup to start your
                day, our knowledgeable baristas are dedicated to crafting the perfect brew to
                suit your taste preferences.</p>
        </div>
    </div>
    @include('Components.LandingComponent.footer')
</body>

</html>
