<?php
$gambar_nailah = asset('simpan/N1.jpg');
$gambar_moshe = asset('simpan/M1.jpg');
$gambar_adelia = asset('simpan/A1.jpg');
?>

<section id="team">
    <div class="content-home">
        <div class="Home-4">
            <div class="desc4">
                <h1>Meet Our Chef</h1>
                <p>Allow us to introduce our talented Chef, the culinary maestro behind every <br>
                    delicious dish at our cafe. With expertise and dedication, our Chef crafts <br>
                    unforgettable culinary experiences every time you visit.
                </p>
            </div>
                <div class="chef-card">
                    <div class="chef-profile">
                        <div class="circle-back"></div>
                        <div class="circle-front"></div>
                        <div class="circle-white"></div>
                        <img src="<?php echo $gambar_nailah; ?>" alt="Nailah">
                        <div class="chef-info">
                            <p class="chef-name">Nailah Septiani<br></p>
                            <p class="title">Line Cook<br></p>
                            <p class="desk">The Line Cook is responsible for the preparation and presentation of café standards dishes.</p>
                        </div>
                    </div>
                    <div class="chef-profile">
                        <div class="circle-back"></div>
                        <div class="circle-front"></div>
                        <div class="circle-white"></div>
                        <img src="<?php echo $gambar_moshe; ?>" alt="Moshe">
                        <div class="chef-info">
                            <p class="chef-name">Moshe Dayan<br></p>
                            <p class="title">Executive Chef<br></p>
                            <p class="desk">As the head of the kitchen, the Executive Chef oversees overall culinary operations of café.</p>
                        </div>
                    </div>
                    <div class="chef-profile">
                        <div class="circle-back"></div>
                        <div class="circle-front"></div>
                        <div class="circle-white"></div>
                        <img src="<?php echo $gambar_adelia; ?>" alt="Adelia">
                        <div class="chef-info">
                            <p class="chef-name">Adelia Zhafira<br></p>
                            <p class="title">Pastry Chef<br></p>
                            <p class="desk">The Pastry Chef specializes in creating a variety of desserts and baked goods for the café.</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>