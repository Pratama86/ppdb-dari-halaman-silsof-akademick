<?php
session_start();

// if (!isset($_SESSION['ssLogin'])) {
//     header("location:../auth/login.php");
//     exit;
// }

require_once "../config1.php";

if (isset($_POST['submit'])) {
    // Ambil id terbesar di kolom id_pendaftaran
    $getMaxId = mysqli_query($koneksi, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tbl_pendaftaran");
    $d = mysqli_fetch_object($getMaxId);

    // Konversi $d->id ke integer, jika NULL jadikan 0
    $maxId = isset($d->id) ? (int)$d->id : 0;

    // Generate ID baru
    $generateId = 'p' . date('Y') . sprintf("%05s", $maxId + 1);

    // Proses insert ke database
    $insert = mysqli_query($koneksi, "INSERT INTO tbl_pendaftaran VALUES (
        '".$generateId."',
        '".date('Y-m-d')."',
        '".$_POST['th_ajaran']."',
        '".$_POST['jurusan']."',
        '".$_POST['mm']."',
        '".$_POST['tmp_lahir']."',
        '".$_POST['tgl_lahir']."',
        '".$_POST['jk']."',
        '".$_POST['agama']."',
        '".$_POST['alamat']."'
    )");

    if ($insert) {
        // Redirect ke halaman berhasil.php dengan ID pendaftaran
        header("Location: /sekolah_ppdb/ppdb/berhasil.php?id=" . $generateId);
        exit;
    } else {
        echo 'Error: ' . mysqli_error($koneksi);
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
        /* Reset margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        /* Section styling */
        .box-formulir {
            background: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .box-formulir h2 {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Table styling */
        .table-form td {
            padding: 3px;
            vertical-align: top;
            color: #444;
            font-size: 16px;
        }

        .table-form td:first-child {
            width: 150px;
            font-weight: bold;
        }

        .table-form input[type="text"],
        .table-form input[type="date"],
        .table-form select,
        .table-form textarea {
            width: 100%;
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 5px;
        }

        .table-form input[type="radio"] {
            margin-right: 5px;
        }

        .table-form textarea {
            height: 100px;
            resize: none;
        }

        .btn-daftar {
            display: block;
            width: 100%;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .btn-daftar:hover {
            background-color: #218838;
        }

        /* Input control styling */
        .input-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Warning styling */
        .peringatan {
            color: #ff0000;
            font-size: 12px;
            display: block;
            margin-top: 5px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .box-formulir {
                padding: 15px;
            }

            .table-form td:first-child {
                width: auto;
            }
        }
    </style>
</head>
<body>
    <section class="box-formulir">
        <h2>Formulir Pendaftaran Siswa PondokIT</h2>
        <form action="" method="post">
            <div class="box">
                <table border="0" class="table-form">
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="th_ajaran" class="input-control" value="2024/2025" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td>
                            <select class="input-control" name="jurusan" required>
                                <option value="">--Pilih--</option>
                                <option value="Umum">Umum</option>
                                <option value="kimia analis">kimia analis</option>
                                <option value="Kimia industri">kimia industri</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama lengkap</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="mm" class="input-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat lahir</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="tmp_lahir" class="input-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal lahir</td>
                        <td>:</td>
                        <td>
                            <input type="date" name="tgl_lahir" class="input-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis kelamin</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="jk" value="laki-laki">Laki-laki
                            <input type="radio" name="jk" value="Perempuan">Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                            <select class="input-control" name="agama" required>
                                <option value="">--Pilih--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat lengkap</td>
                        <td>:</td>
                        <td>
                            <textarea class="input-control" name="alamat" required></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <button type="submit" name="submit" class="btn-daftar">Daftar Sekarang</button>
        </form>
    </section>
</body>
</html>
