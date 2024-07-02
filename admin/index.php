<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin || Dashboard</title>
    <link rel="stylesheet" href="styleAdmin/style.css">
    <link rel="shourtcut icon" href="../assets/icon.svg">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <nav>
        <a href="index.php" class="logo">
            <div class="logoBk">
                <img src="../assets/logoBk.png" alt="">
            </div>
        </a>
        <div>
            <ul class="menu">
                <li><a href="index.php">Berita</a></li>
                <li><a href="komentarBerita.php">Komentar</a></li>
                <li><a href="profile.php">profil</a></li>
                <li><a href="user.php">pengguna</a></li>
            </ul>
        </div>
        <a href="logout.php" class="login">logout</a>
    </nav>
    <section id="indexMain">
        <div class="tambahData">
            <a href="tambahBerita.php" class="login"><button>Tambah Data</button></a>
        </div>

        <h1>DATA BERITA</h1>

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>JUDUL</th>
                    <th>SINOPSIS</th>
                    <th>ISI BERITA</th>
                    <th>TIPE</th>
                    <th>URL GAMBAR</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../koneksi.php";

                $id = "";
                $query = "select * from berita";

                $result = $mysqli->query($query);

                $num_results = $result->num_rows;

                if ($num_results > 0) {
                    while ($row = $result->fetch_assoc()) {
                        extract($row);
                        ?>
                        <tr>
                            <td><?php echo ("{$judul}"); ?></td>
                            <td><?php echo ("{$sinopsis}"); ?></td>
                            <td><?php echo ("{$isiBerita}"); ?></td>
                            <td><?php echo ("{$tipe}"); ?></td>
                            <td><?php echo ("{$gambar}"); ?></td>
                            <td><?php echo ("<a href='updateBerita.php?id={$id}'><button style='background-color : #548CA8; border-radius : 5px; width: 80px; height: 30px; color : #EEEEEE; border : none; '>Edit</button></a> / <a href='#' onclick='delete_data({$id});'><button style='backgorund-color : #EEEEEE; border-radius : 5px;border: 1px solid #548CA8;width: 80px; height: 30px;'>Hapus</button></a>"); ?></td>
                        </tr>
                <?php
                    }
                }
                ?>

                <?php

                include "../koneksi.php";
                $id = "";

                $action = isset($_GET["action"]) ? $_GET["action"] : "";

                if ($action == "delete") {
                    $query = "delete from berita WHERE id = " . $mysqli->real_escape_string($_GET["id"]) . "";

                    if ($mysqli->query($query)) {
                        echo "<script>alert('Data Berhasil Dihapus.');window.location='index.php';</script>";
                    } else {
                        echo ("gagal menghapus data");
                    }
                }
                ?>
            </tbody>
        </table>
    </section>
    <br>
    <br>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function delete_data(id) {
            var answer = confirm("Apakah Anda Yakin Menghapus Data ini?");

            if (answer) {
                window.location = "index.php?action=delete&id=" + id;
            }
        }
    </script>

</body>

</html>