<?php
// koneksi ke database
require 'functions.php';

// apakah tombol registrasi sudah diklik atau belum
if ( isset($_POST["registrasi"]) ) {

    if ( registrasi($_POST) > 0 ) {
        echo"<script>
                alert('user baru berhasil ditambahkan');
            </script>";
    } else {
        echo mysqli_error($conn);
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="m-5">

    <div class="container p-5">

        <form action="" method="post" class="p-5"
            style="background-image: url(https://sacode.web.id/assets/img/logo/logo-sacode-meta.jpg); background-repeat: no-repeat; background-position: center; border-radius: 100%;">
            <h1 class="text-center fw-bold text-light">Registrasi</h1>

            <ul class="list-inline d-flex align-items-center flex-column">
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Nama ID">
                        <label for="username">Nama ID</label>
                    </li>
                </div>

                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </li>
                </div>

                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="password" name="password2" id="password2" class="form-control"
                            placeholder="Konfirmasi Password">
                        <label for="password2">Konfirmasi Password</label>
                    </li>
                </div>

                <div class="col-4 p-2">
                    <li class="form-floating">
                        <button type="submit" name="registrasi" class="btn btn-outline-light"><i
                                class="fa-solid fa-plus"></i> Tambah</button>
                        <a href="login.php" type="submit" class="btn btn-outline-light ms-2"><i
                                class="fa-solid fa-right-to-bracket"></i> Masuk</a>
                    </li>
                </div>
            </ul>

        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>