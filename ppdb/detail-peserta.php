<?php
session_start();
if ($_SESSION['stat_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

require_once "../config1.php";

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}

$peserta = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE id_pendaftaran = '" . $_GET['id'] . "'");
$p = mysqli_fetch_object($peserta);

$title = "Pendaftaran - Pondok Informatika";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peserta | Administrator</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;500;700&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f6fa;
            color: #333;
        }
        header {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            margin: 0;
            font-size: 1.5em;
        }
        header ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        header ul li {
            margin-left: 20px;
        }
        header ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        header ul li a:hover {
            color: #c8e6c9;
        }
        .content {
            width: 80%;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .content h2 {
            margin-top: 0;
            font-size: 1.8em;
            color: #4caf50;
            text-align: center;
            border-bottom: 2px solid #4caf50;
            padding-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table td {
            padding: 10px;
            vertical-align: top;
        }
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tr td:first-child {
            font-weight: 600;
            width: 30%;
        }
        .table tr td:nth-child(2) {
            width: 5%;
            text-align: center;
        }
        .table tr td:nth-child(3) {
            width: 65%;
        }
        footer {
            text-align: center;
            padding: 15px 0;
            background: #4caf50;
            color: #fff;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<header>
    <h1>Admin PSB</h1>
    <ul>
        <li><a href="beranda.php">Beranda</a></li>
        <li><a href="data-peserta.php">Data Peserta</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>
</header>

<section class="content">
    <h2>Detail Peserta</h2>
    <table class="table">
        <tr>
            <td>Kode Pendaftaran</td>
            <td>:</td>
            <td><?php echo $p->id_pendaftaran; ?></td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td>
            <td>:</td>
            <td><?php echo $p->th_ajaran; ?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td><?php echo $p->jurusan; ?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?php echo $p->mm_peserta; ?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td><?php echo $p->tmp_lahir . ', ' . $p->tgl_lahir; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?php echo $p->jk; ?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?php echo $p->agama; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $p->almt_peserta; ?></td>
        </tr>
    </table>

</section>
<!-- Button to go back to the main page -->
<div style="text-align: center; margin-top: 20px;">
    <a href="../index.php" style="text-decoration: none; padding: 10px 20px; background-color: #4caf50; color: white; border-radius: 5px; font-weight: bold;">Kembali ke Halaman Utama</a>
</div>


<footer>
    &copy; <?php echo date('Y'); ?> Pondok Informatika. All Rights Reserved.
</footer>

</body>
</html>
