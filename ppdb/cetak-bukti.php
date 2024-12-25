<?php

session_start();



// if (!isset($_SESSION['ssLogin'])) {
//     header("location:../auth/login.php");
//     exit;
// }

require_once "../config1.php";

$title = "Pendaftaran - Pondok Informatika";
//  require_once "../templete/header.php";
//  require_once "../templete/navbar.php";
//  require_once "../templete/sidebar.php";

$peserta = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE id_pendaftaran = '".$_GET['id']."' ");
$p = mysqli_fetch_object($peserta);
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
            background-color: #f4f4f4; 
            margin: 0; 
            padding: 0;
        }
        .container {
            width: 60%; 
            margin: 125px auto; 
            overflow: hidden; 
            padding: 20px; 
            background: #fff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            text-align: center; /* Center-align the header text */ 
            margin-top: 20px;
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin: 20px 0;
        }
        table, th, td{
            border: 1px solid #ddd;
        }
        th, td { 
        padding: 12px; 
        text-align: center; /* Center-align text in table cells */ 
        }
        tr:nth-child(even) { 
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd; 
        }


        /* css buttom */
        /* Menata container tombol */
        .btn-container {
            text-align: center; /* Menyusun tombol di tengah */
            margin-top: 20px; /* Memberikan jarak atas */
        }

        /* Menata tombol "Tambah User" */
        .btn-tambah-user {
            background-color: #4CAF50; /* Warna latar belakang hijau */
            color: white; /* Warna teks putih */
            padding: 10px 20px; /* Jarak dalam tombol */
            text-decoration: none; /* Menghapus garis bawah pada link */
            border-radius: 5px; /* Menambahkan sudut yang melengkung */
            font-size: 16px; /* Ukuran font */
            transition: background-color 0.3s ease; /* Efek transisi saat hover */
        }

        /* Efek hover untuk tombol */
        .btn-tambah-user:hover {
            background-color: #45a049; /* Warna latar belakang hijau yang lebih gelap saat hover */
        }


    </style>
    <script>
        window.print();
    </script>
</head>
<body>

    <div class="container">
        <h2>Bukti pendaftaran</h2>
        <table>
            <tr>
                <td>Kode pendaftaran</td>
                <td>:</td>
                <td><?php echo $p->id_pendaftaran?></td>
            </tr>
            <tr>
                <td>Tahun ajaran</td>
                <td>:</td>
                <td><?php echo $p->th_ajaran?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><?php echo $p->jurusan?></td>
            </tr>
            <tr>
                <td>Nama lengkap</td>
                <td>:</td>
                <td><?php echo $p->mm_peserta?></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?php echo $p->tmp_lahir.', '.$p->tgl_lahir ?></td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>:</td>
                <td><?php echo $p->jk ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?php echo $p->agama ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $p->almt_peserta?></td>
            </tr>
        </table>
        <div class="btn-container">
                <!-- Tombol Tambah User -->
                <a href="../user/add-user.php" class="btn-tambah-user">Tambah User</a>
        </div>
    </div> 




</body>
</html>