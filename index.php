<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Kami</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shourtcut icon" href="assets/icon.svg">
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
                <li><a href="#main">Beranda</a></li>
                <li><a href="pilihKategori.php">Kategori</a></li>
                <li><a href="about.php">Tentang</a></li>
            </ul>
        </div>
        <a href="admin/loginAdmin.php" class="login">Login</a>
    </nav>

    <section id="main">
        <div class="product-title-hr">
            <h1 class="title-cen">TRENDING TOPIK</h1>
        </div>
        <?php
        include "koneksi.php";
        $id = "";
        $query = "select * from berita where tipe = 'trending'";

        $result = $mysqli->query($query);

        $num_results = $result->num_rows;

        if ($num_results > 0) {
            while ($row = $result->fetch_assoc()) {
                extract($row);
        ?>
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="cardMain">
                            <img src="<?php echo htmlspecialchars($gambar); ?>" alt="">
                            <h1 class="textColor"><?php echo htmlspecialchars($judul); ?></h1>
                            <a href="readBerita.php?id=<?php echo $id; ?>">Baca disini</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </section>

    <section id="about">
        <?php
        include "koneksi.php";
        $query = "SELECT * FROM berita WHERE tipe='terkini'";

        $id = "";
        $action = isset($_GET["action"]) ? $_GET["action"] : "";

        $result = $mysqli->query($query);

        $num_results = $result->num_rows;

        if ($num_results > 0) {
            while ($row = $result->fetch_assoc()) {
                extract($row);
        ?>
                <div class="about-media">
                    <img src="<?php echo $gambar; ?>" alt="">
                </div>
                <div class="about">
                    <h1>Berita Terkini</h1>
                    <h2><?php echo $sinopsis; ?></h2>
                    <br>
                    <a href="readBerita.php?id=<?php echo $id; ?>">Baca disini</a>
                </div>
        <?php
            }
        }
        ?>
    </section>

    <section id="product">
        <div class="product-title">
            <h1>BERITA</h1>
        </div>

        <?php
        include "koneksi.php";
        $query = "SELECT * FROM berita WHERE tipe='biasa' LIMIT 3";

        $id = "";
        $action = isset($_GET["action"]) ? $_GET["action"] : "";

        $result = $mysqli->query($query);

        $num_results = $result->num_rows;

        if ($num_results > 0) {
            while ($row = $result->fetch_assoc()) {
                $gambar = $row["gambar"];
                $sinopsis = $row["sinopsis"];
                $id = $row["id"];
        ?>
                <div class="product-media">
                    <img src="<?php echo $gambar; ?>" alt="">
                    <br>
                    <p><?php echo $sinopsis; ?><br><br>
                        <a href="readBerita.php?id=<?php echo $id; ?>">Baca Berita</a>
                </div>
        <?php
            }
        }
        ?>
    </section>

    <section id="product">
        <?php
        include "koneksi.php";
        $query = "SELECT * FROM berita WHERE tipe='biasa2' LIMIT 3";

        $id = "";
        $action = isset($_GET["action"]) ? $_GET["action"] : "";

        $result = $mysqli->query($query);

        $num_results = $result->num_rows;

        if ($num_results > 0) {
            while ($row = $result->fetch_assoc()) {
                $gambar = $row["gambar"];
                $sinopsis = $row["sinopsis"];
                $id = $row["id"];
        ?>
                <div class="product-media">
                    <img src="<?php echo $gambar; ?>" alt="">
                    <br>
                    <p><?php echo $sinopsis; ?><br><br>
                        <a href="readBerita.php?id=<?php echo $id; ?>">Baca Berita</a>
                </div>
        <?php
            }
        }
        ?>
        <div class="product-title-lf">
            <h1>HARIAN</h1>
        </div>
    </section>

    <section id="komentar">
        <?php
        $action = isset($_POST["action"]) ? $_POST["action"] : "";
        if ($action == "create") {

            include "koneksi.php";

            $query = "insert into komentar set 
         nama   = '" . $mysqli->real_escape_string($_POST["nama"]) . "',
         isiKomentar = '" . $mysqli->real_escape_string($_POST["isiKomentar"]) . "'";

            if ($mysqli->query($query)) {
                // echo "Terima Kasih";
            } else {
                echo "Terdapat Gangguan";
            }

            $mysqli->close();
        }
        ?>
        <div class="komentarImg">
            <img src="assets/komenImg.svg" alt="">
        </div>
        <div class="komentarInput">
            <form action="" method="post" class="komentarForm">
                <table>
                    <tr>
                        <td>
                            <h3 class="title-cen">Berikan Tanggapan Anda di Bawah ini</h3>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td><input type='text' name='nama' class="inputNama" placeholder="Nama" required /></td>
                    </tr>
                    <tr>
                        <td><textarea name='isiKomentar' class="inputIsi" rows='4' cols='50' placeholder="Ketik disini..." required></textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <input type='hidden' name='action' value='create' />
                            <input type='submit' class="inputButton" value='Save' />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>

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
        setTimeout(showSlides, 2000);
    }

    function pindah(url) {
        window.location = url;
    }
</script>

</html>