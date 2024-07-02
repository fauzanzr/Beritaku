<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard || Tambah Berita</title>
    <link rel="shourtcut icon" href="../assets/icon.svg">
    <link rel="stylesheet" href="styleAdmin/styleTambahBerita.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.cs">

</head>

<body>
    <div class="modalCon" id="myModal" style="margin-top: 0px ;">
        <form action="" method="post" class="">
            <div class="imgcontainer imgLogin titleForm">
                <br>
                <p>TAMBAH BERITA</p>
            </div>

            <div class="container modalInput">
                <input type="text" placeholder="Masukkan Judul" name="judul" required>

                <input type="text" placeholder="Masukkan Sinopsis" name="sinopsis" required>

                <textarea name="isiBerita" id="" cols="30" rows="10" placeholder="Masukkan Isi Berita" required></textarea>

                <select id="" name="tipe" required>
                    <option value="trending">Trending</option>
                    <option value="edukasi">Edukasi</option>
                    <option value="teknologi">Teknologi</option>
                    <option value="makanan">Makanan</option>
                    <option value="kesehatan">Kesehatan</option>
                    <option value="olahraga">Olahraga</option>
                    <option value="wisata">Wisata</option>
                </select>

                <input type="text" placeholder="Masukkan url Gambar" name="gambar" required>

                <div class="buttonRegister">
                    <input class="buttonR" type="submit" value="TAMBAH" />
                    <input type="hidden" name="action" value="create" />
                </div>
            </div>
            <br>
            <br>
        </form>

        <?php
        // session_start();
        // if (empty($_SESSION['username']) || $_SESSION['password'] == '') {
        //     header("Location: ../index.php");
        //     die();
        // }

        $action = isset($_POST["action"]) ? $_POST["action"] : "";
        if ($action == "create") {

            include "../koneksi.php";


            $query = "insert into berita set 
                 judul              = '" . $mysqli->real_escape_string($_POST["judul"]) . "',
                 sinopsis           = '" . $mysqli->real_escape_string($_POST["sinopsis"]) . "',
                 tipe               = '" . $mysqli->real_escape_string($_POST["tipe"]) . "',
                 gambar             = '" . $mysqli->real_escape_string($_POST["gambar"]) . "',
                 isiBerita          = '" . $mysqli->real_escape_string($_POST["isiBerita"]) . "'";


            if ($mysqli->query($query)) {
                header('location:index.php');
            } else {
                echo "Gagal menambahkan data";
            }

            $mysqli->close();
        }
        ?>
    </div>
</body>

</html>