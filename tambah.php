<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
    
    // cek apakah data berhasil di tambahkan atau tidak
    if ( tambah($_POST) > 0 ) {
        echo "
            <script>
            alert('data barhasil ditambahkan!');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "<script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="mt-5">

    <div class="container m-5">
        <h1 class="text-center"><i class="fa-solid fa-plus"></i> Tambah Data</h1>

        <form action="" method="post" enctype="multipart/form-data" class="p-5 ms-5">

            <ul class="list-inline d-flex align-items-center flex-column">

                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama " required>
                        <label for="nama">Nama </label>
                    </li>
                </div>

                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="text" name="npm" id="npm" class="form-control" placeholder="NPM " required>
                        <label for="npm">NPM </label>
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email " required>
                        <label for="email">Email </label>
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Jurusan "
                            required>
                        <label for="jurusan">Jurusan </label>
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="file" name="gambar" class="form-control btn btn-outline-light" id="gambar"
                            placeholder="Gambar ">
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <button type="submit" name="submit" class="btn btn-outline-dark"><i
                                class="fa-solid fa-plus"></i> Tambah Data</button>
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