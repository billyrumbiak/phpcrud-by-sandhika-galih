<?php
session_start();

require "functions.php";

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");

    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }

}

if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}


    if( isset($_POST["login"]) ) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

        // cek username
        if( mysqli_num_rows($result) === 1 ) {

            // cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) );
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if( isset($_POST["remember"]) ) {
                // buat cookie
                setcookie('id', $row['id'], time()+120);
                setcookie('key', hash('sha256', $row['username']), time()+120);
            }
            
            header("Location: index.php");
            exit;
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container my-5 py-5">
        <form action="" method="post" class="form-control bg-info my-5">
            <h1 class="text-center py-3 text-white"><i class="fa-solid fa-right-to-bracket"></i> Halaman Login</h1>
            <?php if(isset ($error) ) : ?>
            <p>Username - Password salah!</p>
            <?php endif ; ?>
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
                    <li class="d-grid">
                        <button type="submit" name="login" class="btn btn-primary"><i
                                class="fa-solid fa-right-to-bracket"></i> Login</button>
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="form-check text-white">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label for="remember">Remember Me</label>
                    </li>
                </div>
                <div class="col-4 p-2">
                    <li class="d-grid">
                        <a href="registrasi.php" class="btn btn-secondary"><i class="fa-solid fa-plus"></i>
                            Registrasi</a>
                    </li>
                </div>
            </ul>
        </form>
    </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>