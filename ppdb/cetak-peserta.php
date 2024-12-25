<?php

session_start();



if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config1.php";

$title = "Pendaftaran - Pondok Informatika";
//  require_once "../templete/header.php";
//  require_once "../templete/navbar.php";
//  require_once "../templete/sidebar.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak peserta</title>
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

    </style>
    <script>
        window.print();
    </script>
</head>
<body>

    <div class="container">
        <h2>Laporan calon siswa</h2><br><br>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID pendaftaran</th>
                    <th>Tahun ajaran</th>
                    <th>Jurusan</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal lahir</th>
                    <th>Jenis kelamin</th>
                    <th>Agama</th>
                    <th>Alamat peserta</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $list_peserta = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran");
                while($row = mysqli_fetch_array($list_peserta)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['id_pendaftaran'] ?></td>
                    <td><?php echo $row['th_ajaran'] ?></td>
                    <td><?php echo $row['jurusan'] ?></td>
                    <td><?php echo $row['mm_peserta'] ?></td>
                    <td><?php echo $row['tmp_lahir'].', '.$row['tgl_lahir'] ?></td>
                    <td><?php echo $row['jk'] ?></td>
                    <td><?php echo $row['agama'] ?></td>
                    <td><?php echo $row['almt_peserta'] ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <div style="text-align: start; margin-top: 20px;">
            <a href="javascript:history.back()" 
            style="text-decoration: none; padding: 10px 20px; background-color: #4caf50; color: white; border-radius: 5px; font-weight: bold; display: inline-block;">
            Kembali
            </a>
        </div>
    </div> 



</body>
</html>