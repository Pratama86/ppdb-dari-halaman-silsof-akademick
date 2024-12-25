<?php
session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config1.php";

$title = "Pendaftaran - Pondok Informatika";
require_once "../templete/header.php";
require_once "../templete/navbar.php";
require_once "../templete/sidebar.php";

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['user']);
    $pass = mysqli_real_escape_string($koneksi, md5($_POST['pass']));

    // Cek akun ada atau tidak
    $cek = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username = '$user' AND password = '$pass'");

    if (mysqli_num_rows($cek) > 0) {
        $a = mysqli_fetch_object($cek);

        $_SESSION['stat_login'] = true;
        $_SESSION['id'] = $a->id_admin;
        $_SESSION['nama'] = $a->mm_peserta;  // Perbaikan di sini

        echo '<script>window.location="beranda.php"</script>';
    } else {
        echo '<script>alert("Gagal, username atau password salah")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB Online</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            display: flex;
            margin: 100px auto;
            height: 100vh;
        }

        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            padding: 20px;
            margin-top: 100px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .input-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            margin: 20px 0;
        }

        .btn-login:hover {
            cursor: pointer;
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
<div id="layoutSidenav_content">  
        <div class="container">
            <h1>Login Admin</h1>
            <form action="" method="post">
                <div class="box">
                    <label for="user">Username</label>
                    <input type="text" name="user" class="input-control" id="user" required>
                    
                    <label for="pass">Password</label>
                    <input type="password" name="pass" class="input-control" id="pass" required>
                    
                    <input type="submit" name="login" value="Login" class="btn-login">
                </div>
            </form>
        </div>




<?php
require_once "../templete/footer.php";
?>
</div>
</body>
</html>
