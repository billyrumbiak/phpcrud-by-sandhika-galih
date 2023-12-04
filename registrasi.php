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

</head>

<body>

    <main class="container">

        <h1 class="text-center fw-bold">Registrasi</h1>

        <div class="row d-flex justify-content-center">
            <form action="" method="post" class="col-4">

                <ul class="list-group">
                    <li class="list-group-item">
                        <label for="username">Username :</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </li>

                    <li class="list-group-item">
                        <label for="password">Password :</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </li>
                    <li class="list-group-item">
                        <label for="password2">Konfirmasi Password :</label>
                        <input type="password" name="password2" id="password2" class="form-control">
                    </li>
                    <li class="list-group-item">
                        <button type="submit" name="registrasi" class="btn btn-primary">Registrasi!</button>
                    </li>
                </ul>

            </form>
        </div>


    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>