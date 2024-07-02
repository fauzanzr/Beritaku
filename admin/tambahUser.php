<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard || Tambah Pengguna</title>
    <link rel="shourtcut icon" href="../assets/icon.svg">
    <link rel="stylesheet" href="styleAdmin/styleTambahBerita.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.cs">

</head>

<body>
    <div class="modalCon" id="myModal" style="margin-top: 0px ;">
        <form action="" method="post" class="">
            <div class="imgcontainer imgLogin titleForm">
                <br>
                <p>TAMBAH PENGGUNA</p>
            </div>

            <div class="container modalInput">
                <input type="text" placeholder="Masukkan Nama" name="name" required>

                <input type="text" placeholder="Masukkan Username" name="username" required>

                <input type="password" placeholder="Masukkan Password" name="password" required>

                <input type="email" placeholder="Masukkan Email" name="email" required>

                <select id="" name="level" required>
                    <option value="admin">Admin</option>
                </select>


                <div class="buttonRegister">
                    <input class="buttonR" type="submit" value="TAMBAH" />
                    <input type="hidden" name="action" value="create" />
                </div>
            </div>
            <br>
            <br>
        </form>

        <?php

        $action = isset($_POST["action"]) ? $_POST["action"] : "";
        if ($action == "create") {

            include "../koneksi.php";

            $query = "insert into user set 
                 name              = '" . $mysqli->real_escape_string($_POST["name"]) . "',
                 username           = '" . $mysqli->real_escape_string($_POST["username"]) . "',
                 password           = '" . $mysqli->real_escape_string($_POST["password"]) . "',
                 email           = '" . $mysqli->real_escape_string($_POST["email"]) . "',
                 level           = '" . $mysqli->real_escape_string($_POST["level"]) . "'";


            if ($mysqli->query($query)) {
                header('location:user.php');
            } else {
                echo "Gagal menambahkan data";
            }

            $mysqli->close();
        }
        ?>
    </div>
</body>

</html>