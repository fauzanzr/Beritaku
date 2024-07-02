<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard || Edit Berita</title>
    <link rel="shourtcut icon" href="../assets/icon.svg">
    <link rel="stylesheet" href="styleAdmin/styleUpdate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.cs">

</head>

<body>

    <?php
    // session_start();
    // if (empty($_SESSION['username']) || $_SESSION['password'] == '') {
    //     header("Location: ../index.php");
    //     die();
    // }

    include "../koneksi.php";

    $action = isset($_POST["action"]) ?
        $_POST["action"] : "";

    if ($action == "update") {
        $query = "update berita set
                  judul              = '" . $mysqli->real_escape_string($_POST["judul"]) . "',
                  sinopsis       = '" . $mysqli->real_escape_string($_POST["sinopsis"]) . "',
                  tipe       = '" . $mysqli->real_escape_string($_POST["tipe"]) . "',
                  gambar       = '" . $mysqli->real_escape_string($_POST["gambar"]) . "',
                  isiBerita       = '" . $mysqli->real_escape_string($_POST["isiBerita"]) . "'
                  where id          = '" . $mysqli->real_escape_string($_REQUEST["id"]) . "'";

        if ($mysqli->query($query)) {
            header('location:index.php');
        } else {

            echo ("Data gagal diubah");
        }
    }

    $query = "select id, judul, sinopsis, tipe, gambar, isiBerita
              from berita
              where id='" . $mysqli->real_escape_string($_REQUEST["id"]) . "'
              limit 0,1";

    $result = $mysqli->query($query);

    $row = $result->fetch_assoc();

    $id = isset($row["id"]) ? $row["id"] : 0;

    $id             = $row["id"];
    $judul          = $row["judul"];
    $sinopsis       = $row["sinopsis"];
    $tipe           = $row["tipe"];
    $gambar           = $row["gambar"];
    $isiBerita           = $row["isiBerita"];

    ?>
    <div class="modalCon" id="myModal" style="margin-top: 0px ;">
        <form action="" method="post" class="">
            <div class="imgcontainer imgLogin titleForm">
                <br>
                <p>EDIT BERITA</p>
            </div>

            <div class="container modalInput">
                <p>Judul</p>
                <input type="text" placeholder="Masukkan Judul" name="judul" required value='<?php echo $judul; ?>'>

                <p>Sinopsis</p>
                <input type="text" placeholder="Masukkan Sinopsis" name="sinopsis" required value='<?php echo $sinopsis; ?>'>

                <p>Isi Berita</p>
                <textarea name="isiBerita" id="" cols="30" rows="10" placeholder="Masukkan Isi Berita" required><?php echo $isiBerita; ?></textarea>

                <p>Tipe</p>
                <select id="" name="tipe" required>
                    <option value="trending" <?php if ($tipe == 'trending') echo 'selected' ?>>Trending</option>
                    <option value="terkini" <?php if ($tipe == 'terkini') echo 'selected' ?>>Terkini</option>
                    <option value="biasa" <?php if ($tipe == 'biasa') echo 'selected' ?>>Biasa</option>
                    <option value="biasa2" <?php if ($tipe == 'biasa2') echo 'selected' ?>>Biasa2</option>
                    <option value="edukasi" <?php if ($tipe == 'edukasi') echo 'selected' ?>>Edukasi</option>
                    <option value="teknologi" <?php if ($tipe == 'teknologi') echo 'selected' ?>>Teknologi</option>
                    <option value="makanan" <?php if ($tipe == 'makanan') echo 'selected' ?>>Makanan</option>
                    <option value="kesehatan" <?php if ($tipe == 'kesehatan') echo 'selected' ?>>Kesehatan</option>
                    <option value="olahraga" <?php if ($tipe == 'olahraga') echo 'selected' ?>>Olahraga</option>
                    <option value="wisata" <?php if ($tipe == 'wisata') echo 'selected' ?>>Wisata</option>
                </select>

                <P>Url Gambar</P>
                <input type="text" placeholder="Masukkan url Gambar" name="gambar" required value='<?php echo $gambar; ?>'>

                <div class="buttonRegister">
                    <input type="hidden" name="id" value='<?php echo $id; ?>'>
                    <input type="hidden" name="action" value="update">
                    <input type="submit" value="EDIT">
                </div>
            </div>
            <br>
            <br>
        </form>


    </div>
</body>

</html>