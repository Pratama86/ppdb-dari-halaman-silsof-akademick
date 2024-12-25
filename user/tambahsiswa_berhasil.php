<?php
session_start();

// Periksa apakah pengguna sudah login
// if (!isset($_SESSION['ssLogin'])) {
//     header("location: ../auth/login.php");
//     exit;
// }

// Judul halaman
$title = "Tambah Siswa Berhasil";

// Menampilkan pesan sukses
$msg = "Siswa berhasil ditambahkan ke sistem.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        /* Global Styles */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #28a745;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        p.lead {
            font-size: 1.2rem;
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 5px;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 5px;
            color: #fff;
            transition: background 0.3s;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #565e64;
        }
        i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fa-solid fa-circle-check"></i> <?= $title ?></h1>
        <p class="lead"><?= $msg ?></p>
        <a href="form_simpan.php" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Siswa Lagi
        </a>
        <a href="index.php" class="btn btn-secondary">
            <i class="fa-solid fa-home"></i> Kembali ke Beranda
        </a>
    </div>
</body>
</html>
