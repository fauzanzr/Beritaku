<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard || Edit Pengguna</title>
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
        $query = "update user set
                  name              = '" . $mysqli->real_escape_string($_POST["name"]) . "',
                  username              = '" . $mysqli->real_escape_string($_POST["username"]) . "',
                  email       = '" . $mysqli->real_escape_string($_POST["email"]) . "'
                    where id          = '" . $mysqli->real_escape_string($_REQUEST["id"]) . "'";

        if ($mysqli->query($query)) {
            header('location:user.php');
        } else {
            echo ("Data gagal diubah");
        }
    }

    $query = "select id, name, username, email
              from user
              where id='" . $mysqli->real_escape_string($_REQUEST["id"]) . "'
              limit 0,1";

    $result = $mysqli->query($query);

    $row = $result->fetch_assoc();

    $id = isset($row["id"]) ? $row["id"] : 0;

    $id             = $row["id"];
    $name          = $row["name"];
    $username       = $row["username"];
    $email           = $row["email"];

    ?>
    <div class="modalCon" id="myModal" style="margin-top: 0px ;">
        <form action="" method="post" class="">
            <div class="imgcontainer imgLogin titleForm">
                <br>
                <p>EDIT PENGGUNA</p>
            </div>

            <div class="container modalInput">
                <p>Name</p>
                <input type="text" placeholder="Masukkan Name" name="name" required value='<?php echo $name; ?>'>

                <p>Username</p>
                <input type="text" placeholder="Masukkan Username" name="username" required value='<?php echo $username; ?>'>

                <p>Email</p>
                <input type="email" placeholder="Masukkan Email" name="email" required value='<?php echo $email; ?>'>

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