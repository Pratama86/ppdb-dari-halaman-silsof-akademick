<?php
session_start();
if ($_SESSION['stat_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// if (!isset($_SESSION['ssLogin'])) {
//     header("location:../auth/login.php");
//     exit;
// }

require_once "../config1.php";

$title = "Pendaftaran - Pondok Informatika";
// require_once "../templete/header.php";
// require_once "../templete/navbar.php";
// require_once "../templete/sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB Online | Administrator</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(135deg, #71b7e6,rgb(19, 4, 25));
            margin: 0;
            text-decoration: none;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #fff;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            
        }
        header::after {
            content: '';
            display: block;
            clear: both;
        }
        header h1 {
            padding: 0 20px;
            display: inline-block;
            text-decoration: none;
            float: left;
            color:rgb(11, 2, 15);
        }
        header ul {
            float: left;
        }
        header ul li {
            padding: 10px 20px;
            display: inline-block;
        }
        header ul li a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }
        header ul li a:hover {
            color: #9b59b6;
        }
        .content {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .box {
            text-align: center;
        }
        .box h3 {
            margin: 0;
            padding: 20px;
            background: #71b7e6;
            color: #fff;
            border-radius: 8px;
        }
        .box p {
            font-size: 18px;
            margin: 20px 0;
        }
        .footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
            /* CSS untuk tombol "Kembali" */
        .btn-custom-back {
            background-color: #6c757d; /* Warna latar belakang abu-abu */
            color: white; /* Warna teks putih */
            font-size: 16px; /* Ukuran font */
            padding: 10px 20px; /* Jarak dalam tombol */
            border-radius: 5px; /* Sudut melengkung */
            border: none; /* Menghilangkan border default */
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s, transform 0.3s; /* Efek transisi */
        }

        .btn-custom-back a {
            text-decoration: none;  
            color: white;
        }

        /* Efek hover untuk tombol */
        .btn-custom-back:hover {
            background-color: #5a6268; /* Warna latar belakang sedikit lebih gelap saat hover */
            cursor: pointer; /* Ubah pointer saat hover */
            transform: scale(1.05); /* Sedikit membesar saat di-hover */
        }

        /* Ikon di dalam tombol */
        .btn-custom-back i {
            margin-right: 10px; /* Memberikan jarak antara ikon dan teks */
        }

        /* Responsif di layar kecil */
        @media (max-width: 576px) {
            .btn-custom-back {
                font-size: 14px; /* Mengurangi ukuran font di layar kecil */
                padding: 8px 16px; /* Menyesuaikan padding di layar kecil */
            }
        }



    </style>
</head>
<body>

<!-- bagian header-->
<header>
    <h1><a href="beranda.php">Admin PSB</a></h1>
    <ul>
        <li><a href="beranda.php">Beranda</a></li>
        <li><a href="data-peserta.php">Data peserta</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>
</header>

<!-- bagian konten-->
<section class="content">
    <h2>Beranda</h2>
    <div class="box">
        <h3><?php echo $_SESSION['nama']; ?>, Selamat datang di PSB Online</h3>
        <p>Anda berada di halaman administrasi. Silakan pilih menu di atas untuk mengelola data peserta.</p>
    </div>
</section>

<div class="container my-3">
    <button class="btn-custom-back" onclick="window.history.back()" ><i class="fas fa-arrow-left">
         <a href="login.php">Kembali</a>
    </button>
</div>


<!-- bagian footer-->
<div class="footer">
    <?php
    require_once "../templete/footer.php";
    ?>
</div>

</body>
</html>
