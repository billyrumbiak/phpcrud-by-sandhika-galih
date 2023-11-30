<?php
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
</head>
<body>

<h1>Ubah Data Mahasiswa</h1>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"] ?>">

    <ul>
        <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ?>" required>
        </li>
        <li>
            <label for="npm">NPM : </label>
            <input type="text" name="npm" id="npm" value="<?= $mhs["npm"] ?>" required>
        </li>
        <li>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" value="<?= $mhs["email"] ?>" required>
        </li>
        <li>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"] ?>" required>
        </li>
        <li>
            <label for="gambar">Gambar : </label>
            <img src="img/<?= $mhs["gambar"]; ?>" width="40"><br>
            <input type="file" name="gambar" id="gambar" required>
        </li>
        <li>
            <button type="submit" name="submit">Ubah Data!</button>
        </li>
    </ul>

</form>
    
</body>
</html>