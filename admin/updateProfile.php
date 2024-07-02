<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard || Edit Profil</title>
    <link rel="shourtcut icon" href="../assets/icon.svg">
    <link rel="stylesheet" href="styleAdmin/styleUpdate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.cs">

</head>

<body>

    <?php
    include "../koneksi.php";

    $action = isset($_POST["action"]) ?
        $_POST["action"] : "";

    if ($action == "update") {
        $query = "update profile set
                  nama              = '" . $mysqli->real_escape_string($_POST["nama"]) . "',
                  nim       = '" . $mysqli->real_escape_string($_POST["nim"]) . "',
                  gambar       = '" . $mysqli->real_escape_string($_POST["gambar"]) . "'where id          = '" . $mysqli->real_escape_string($_REQUEST["id"]) . "'";

        if ($mysqli->query($query)) {
            header('location:profile.php');
        } else {
            echo ("Data gagal diubah");
        }
    }

    $query = "select id, nama, nim, gambar
              from profile
              where id='" . $mysqli->real_escape_string($_REQUEST["id"]) . "'
              limit 0,1";

    $result = $mysqli->query($query);

    $row = $result->fetch_assoc();

    $id = isset($row["id"]) ? $row["id"] : 0;

    $id             = $row["id"];
    $nama          = $row["nama"];
    $nim       = $row["nim"];
    $gambar           = $row["gambar"];

    ?>
    <div class="modalCon" id="myModal" style="margin-top: 0px ;">
        <form action="" method="post" class="">
            <div class="imgcontainer imgLogin titleForm">
                <br>
                <p>EDIT PROFIL</p>
            </div>

            <div class="container modalInput">
                <p>Nama</p>
                <input type="text" placeholder="Masukkan Nama" name="nama" required value='<?php echo $nama; ?>'>

                <p>NIM</p>
                <input type="text" placeholder="Masukkan NIM" name="nim" required value='<?php echo $nim; ?>'>

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