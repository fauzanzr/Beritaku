<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login test</title>
    <link rel="stylesheet" href="styleAdmin/styleAdminLogin.css">
    <link rel="shourtcut icon" href="../assets/icon.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

    <section id="loginPage">
        <div class="mediaLogin">
            <h1>WELCOME</h1>
            <p>DASHBOARD ADMIN</p>
            <img src="../assets/loginAdminn.svg" alt="">
        </div>
        <div class="loginText">
            <button type="button" class="buttonOpen" data-toggle="modal" data-target="#myModal">LOGIN</button>
        </div>
    </section>


    <div class="modal fade modalCon" id="myModal" role="dialog">
        <form action="" method="post" class="">
            <div class="imgcontainer imgLogin">
                <img src="../assets/loginAdmin.svg" alt="Avatar" class="avatar">
            </div>

            <div class="container modalInput">
                <input type="text" placeholder="Enter Username" name="username" required>

                <input type="password" placeholder="Enter Password" name="password" required>

                <div class="buttonLogin">
                    <button type="submit" name="login" class="buttonLogin">LOGIN</button>
                </div>
            </div>

            <div class="container buttonBatal">
                <a href="registerAdmin.php">REGISTER HERE</a>
                <button type="button" class="btn btn-default buttonBatal" data-dismiss="modal">CANCEL</button>
            </div>
            <br>
            <br>
        </form>

        <?php
        session_start();
        include "../koneksi.php";
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = mysqli_query($mysqli, "select * from user where username='$username' and password='$password'");

            $jumlah = mysqli_num_rows($query);

            if ($jumlah > 0) {
                $sesi = mysqli_fetch_assoc($query);

                $_SESSION['id'] = $sesi['id'];
                $_SESSION['username'] = $sesi['username'];
                $_SESSION['level'] = $sesi['level'];

                if (!empty($_SESSION['level'] == 'admin')) {
                    header('location:index.php');
                }
            } else {
                echo 'password salah';
            }
        }
        ?>
    </div>


</body>

</html>