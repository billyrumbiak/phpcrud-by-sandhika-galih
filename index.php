<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

// ambil data di file functions.php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

if ( isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="container text-center mx-auto p-5">
        <h1 class="display-3">Daftar Mahasiswa</h1>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-3">
                <form action="" method="post" class="d-flex">
                    <input type="text" name="keyword" autofocus placeholder="Cari" autocomplete="off"
                        class="form-control me-2">
                    <button type="submit" name="cari" class="btn btn-secondary"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="col-9 text-end">
                <a href="tambah.php" class="btn btn-primary">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="logout.php" class="btn btn-dark">Keluar <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>


    <div class="container">
        <table class="table table-striped table-bordered table-hover rounded-3 overflow-hidden">

            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <!-- autofocus adalah atirbut untuk memunculkan krusor secara otomatis -->
            <!-- autocomplete adalah atirbut untuk menghilangkan history pada pencarian -->

            <?php $i = 1; ?>
            <?php foreach( $mahasiswa as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')"
                        class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="80px" class="img-thumbnail mx-auto d-block"></td>
                <td><?= $row["npm"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>