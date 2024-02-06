<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// ambil data dari URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
    

    // cek apakah data berhasil diubah atau tidak
    if ( ubah($_POST) > 0 ) {
        echo "
            <script>
            alert('data barhasil diubah!');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "<script>
        alert('data gagal diubah!');
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
    <title>Ubah Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="mt-5">

    <div class="container m-5">
        <h1 class="text-center">Ubah Data</h1>
        <form action="" method="post" enctype="multipart/form-data" class="p-5 ms-5">
            <input type="hidden" name="id" value="<?= $mhs["id"] ?>" class="form-control">
            <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"] ?>" class="form-control">

            <ul class="list-inline d-flex align-items-center flex-column">

                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ?>" class="form-control"
                            placeholder="Nama " required>
                        <label for="nama">Nama </label>
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="text" name="npm" id="npm" value="<?= $mhs["npm"] ?>" class="form-control"
                            placeholder="NPM " required>
                        <label for="npm">NPM </label>
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="text" name="email" id="email" value="<?= $mhs["email"] ?>" class="form-control"
                            placeholder="Email" required>
                        <label for="email">Email </label>
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"] ?>"
                            class="form-control" placeholder="Jurusan" required>
                        <label for="jurusan">Jurusan </label>
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <input type="file" name="gambar" id="gambar" class="form-control btn btn-light">
                        <img src="img/<?= $mhs["gambar"]; ?>" width="40">
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-floating">
                        <button type="submit" name="submit" class="btn btn-outline-dark"><i class="fa-solid fa-pen"></i>
                            Ubah</button>
                    </li>
                </div>






            </ul>

        </form>
    </div>



</body>

</html>