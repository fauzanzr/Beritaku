<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Berita</title>
    <link rel="stylesheet" href="style/readBerita.css">
    <link rel="shourtcut icon" href="assets/icon.svg">
</head>

<body>
    <?php
    include "koneksi.php";

    $query = "select id, judul, gambar, isiBerita from berita
              where id='" . $mysqli->real_escape_string($_REQUEST["id"]) . "'
              limit 0,1";

    $result = $mysqli->query($query);

    $row = $result->fetch_assoc();

    $id = isset($row["id"]) ? $row["id"] : 0;

    $id     = $row["id"];
    $judul   = $row["judul"];
    $gambar = $row["gambar"];
    $isiBerita = $row["isiBerita"];
    ?>

    <section id="content">
        <div class="contentBerita">
            <h1><?php echo ("{$judul}"); ?></h1>
            <div class="contentBeritaMedia">
                <img src="<?php echo ("{$gambar}"); ?>" alt="">
            </div>
            <hr>
            <p><?php echo ("{$isiBerita}"); ?></p>
        </div>
        <br>
        <br>
    </section>

</body>

</html>