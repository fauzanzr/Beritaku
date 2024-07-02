<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register test</title>
    <link rel="stylesheet" href="styleAdmin/styleAdminRegister.css">
    <link rel="shourtcut icon" href="../assets/icon.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="modalCon" id="myModal" style="margin-top: 0px ;">
        <form action="" method="post" class="">
            <div class="imgcontainer imgLogin">
                <img src="../assets/registerAdmin.svg" alt="Avatar" class="avatar">
            </div>

            <div class="container modalInput">
                <input type="text" placeholder="Enter Name" name="name" required>

                <input type="email" placeholder="Enter Email" name="email" required>

                <input type="text" placeholder="Enter Username" name="username" required>

                <input type="password" placeholder="Enter Password" name="password" required>

                <div class="buttonRegister">
                    <input class="buttonR" type="submit" value="REGISTER" />
                    <input type="hidden" name="action" value="create" />
                </div>
            </div>

            <div class="container buttonBatal">
                <a href="loginAdmin.php"><button type="button" class="btn btn-default buttonBatal" data-dismiss="modal">CANCEL</button></a>
            </div>
            <br>
            <br>
        </form>

        <?php
        $action = isset($_POST["action"]) ? $_POST["action"] : "";

        if ($action == "create") {
            include "../koneksi.php";

            $query = "insert into user set 
            name           = '" . $mysqli->real_escape_string($_POST["name"]) . "',
            username       = '" . $mysqli->real_escape_string($_POST["username"]) . "',
            password       = '" . $mysqli->real_escape_string($_POST["password"]) . "',
            email          = '" . $mysqli->real_escape_string($_POST["email"]) . "'";

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