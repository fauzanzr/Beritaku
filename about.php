<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Kami || Tentang </title>
    <link rel="stylesheet" href="style/styleAbout.css">
    <link rel="shourtcut icon" href="assets/icon.svg">
    <style>

    </style>
</head>

<body>
    <nav>
        <a href="index.php" class="logo">
            <div class="logoBk">
                <img src="assets/logoBk.png" alt="">
            </div>
        </a>
        <div>
            <ul class="menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="pilihKategori.php">Kategori</a></li>
                <li><a href="about.php">Tentang</a></li>
            </ul>
        </div>
        <a href="admin/loginAdmin.php" class="login">Login</a>
    </nav>

    <section id="about">
        <div class="about">
            <h2 style="text-transform: uppercase;">Deskripsi</h2>
            <p>Website yang digunakan untuk menyampaikan informasi. Dengan tersedianya informasi, pegunjung website dapat menambah wawasannya dengan informasi baru yang sudah kami sediakan. Kami berharap website ini dapat berguna demi kebanyakan orang dan bisa menjadi motivasi untuk membuat yang lebih lagi.</p>
        </div>
        <div class="about-media">
            <img src="assets/aboutImg.svg" alt="">
        </div>
    </section>

    <section id="product">

        <?php
        include "koneksi.php";

        $query = "select * from profile";

        $result = $mysqli->query($query);

        $num_results = $result->num_rows;

        if ($num_results > 0) {
            while ($row = $result->fetch_assoc()) {
                extract($row);
                ?>
                <div class="product-media">
                    <img src="<?php echo ("{$gambar}"); ?>" alt="">
                    <br></A><?php echo ("{$nama}"); ?></a>
                    <br>
                    <p>NIM <?php echo ("{$nim}"); ?></p>
                </div>
        <?php
            }
        }
        ?>
        <div class="product-title">
            <h2>TIM KAMI</h2>
        </div>
    </section>
    <hr>
    <footer>
        <div class="footer-content">
            <h3>BERITAKAMI</h3>
            <p>Mengatakan... Dingin rumah atapnya rumbia, Dinding papan cukup sederhana, Konsumsi berita mengetahui dunia, Timbul kepedulian antar sesama.</p>
            <ul class="socials">
                <li><a href="#"><img src="assets/facebook.svg" alt=""></a></li>
                <li><a href="#"><img src="assets/twitter.svg" alt=""></a></li>
                <li><a href="#"><img src="assets/google.svg" alt=""></a></li>
                <li><a href="#"><img src="assets/youtube.svg" alt=""></a></li>
                <li><a href="#"><img src="assets/linkedin.svg" alt=""></a></li>
            </ul>
        </div>

    </footer>

</body>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>

</html>