<x-landing.layout>
    <x-slot name="title">Home</x-slot>

    <div class= "content-home">
        <div class="Home-1">
            <div class="list">
                <div class="desc">
                    <h1> 
                    When you are       <br>
                    Seeking Warm and   <br>
                    Craving Delight?   <br>
                    </h1>
                    <p>Cepi Cafe is your perfect destination to explore <br>
                        the comforting allure of coffee and treats that indulge. <br>
                        There's always a spot for you here.
                    </p>
                </div>
            </div>

            <div class="list">
                <div class="pic1">
                    <img src="{{ asset('simpan/pict1.png') }}" alt="Home1"/>
                </div>
            </div>
        </div>
    </div>

    <div class= "content-home">
        <div class="Home-2">
            <div class="desc2">
                <h1> 
                    Our Special Dish<br>
                </h1>
                <p>Indulge further with our selection of signature dishes, <br>
                    each crafted with care to tantalize your taste buds and <br>
                    leave you craving for more.
                </p>
            </div>

            <div class="pic2">
                <img src="{{ asset('simpan/dish5.png') }}" alt="Home2"/>
                <img src="{{ asset('simpan/dish2.png') }}" alt="Home2"/>
                <img src="{{ asset('simpan/dish3.png') }}" alt="Home2"/>
                <img src="{{ asset('simpan/dish6.png') }}" alt="Home2"/>
            </div>

            <br><br>

            <div class="Home-3">
                <div class="pic3">
                    <img src="{{ asset('simpan/plate.png') }}" alt="Home3"/>
                    <div class="desc3-container">
                        <div class="desc3">
                            <h1>Our Menu</h1>
                            <p>Indulge in a world of delightful flavors at our café – <br>
                                simply tap the menu button and let your taste buds <br>
                                journey through our tempting selections.</p>
                        </div>
                        <div class="button-container">
                            <button class="menu-button" onclick="window.location.href='link_ke_menu'">Menu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class= "content-home">
        <div class="Home-4">
            <div class="desc4">
                <h1> 
                    Meet Our Chef <br>
                </h1>
                <p>Allow us to introduce our talented Chef, the culinary maestro behind every <br>
                    delicious dish at our cafe. With expertise and dedication, our Chef crafts <br>
                    unforgettable culinary experiences every time you visit.
                </p>
            </div>

            <div class="pic4">
                <img src="{{ asset('simpan/nailah.png') }}" alt="Home2"/>
                <img src="{{ asset('simpan/moshe1.png') }}" alt="Home2"/>
                <img src="{{ asset('simpan/adel.png') }}" alt="Home2"/>
            </div>
    </div>
    
    <head>
        <title>Home</title>
        <script src="{{ asset('js/all.js') }}"></script>
    </head>

    <div class="container">
        <div class="footer">
            <div class="row">
                <div class="footer-col">
                    <h2>Cepi Cafe</h2>
                    <p>Cepi Cafe is a place filled with inviting warmth and <br>
                        ambiance. Upon entering, you're greeted by the tantalizing <br>
                        aroma of freshly brewed coffee and a friendly atmosphere. <br>
                        Inside, you'll find a wide array of high-quality coffee <br>
                        selections from around the world, ranging from rich and <br>
                        aromatic espressos to carefully crafted pour-over brews. <br>
                    </p>

                    <h4>Opening House</h4>
                    <ul>
                        <li>Monday - Friday <br>
                            8:00 am to 9:00 pm
                        </li>
                        <li>Saturday - Sunday <br>
                            9:00 am to 10:00 pm
                        </li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Dishes</h4>
                    <ul>
                        <li><a href="#">Coffee</a></li>
                        <li><a href="#">Tea</a></li>
                        <li><a href="#">Non-coffee</a></li>
                        <li><a href="#">Cake & Pastry</a></li>
                        <li><a href="#">Sandwich</a></li>
                        <li><a href="#">Snack</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-landing.layout>
