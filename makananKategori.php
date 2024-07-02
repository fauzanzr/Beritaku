<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Kami || Kategori Makanan</title>
    <link rel="stylesheet" href="style/styleKategori.css">
    <link rel="shourt icon" href="assets/icon.svg">
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
                <li><a href="index.php">Berada</a></li>
                <li><a href="pilihKategori.php">Kategori</a></li>
                <li><a href="about.php">Tentang</a></li>
            </ul>
        </div>
        <a href="admin/loginAdmin.php" class="login">Login</a>
    </nav>
    <br>
    <br>

    <?php
    include "koneksi.php";

    $id = "";
    $query = "select * from berita where tipe = 'makanan'";

    $result = $mysqli->query($query);

    $num_results = $result->num_rows;

    if ($num_results > 0) {
        while ($row = $result->fetch_assoc()) {
            extract($row);
            ?>
            <div class="card">
                <img src="<?php echo ("{$gambar}"); ?>" alt="John" style="width:100%">
                <h1><?php echo ("{$judul}"); ?></h1>
                <p class="title"><?php echo ("{$sinopsis}"); ?></p>
                <?php echo ("<a href='readBerita.php?id={$id}'>Baca disini</a>") ?>
                <br>
                <br>
            </div>
            <br>
    <?php
        }
    }
    ?>
</body>

</html>