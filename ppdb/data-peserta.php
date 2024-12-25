<?php
session_start();
if($_SESSION['stat_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config1.php";

$title = "Pendaftaran - Pondok Informatika";
//require_once "../templete/header.php";
//require_once "../templete/navbar.php";
//require_once "../templete/sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB Online | Administrator</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Audio autoplay -->
    
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="beranda.php">Admin PSB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="beranda.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="data-peserta.php">Data Peserta</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carousel-text-box">
        <h3 class="text-center mb-0">
          "Hidup adalah perjalanan panjang,
          Terkadang penuh tawa, terkadang air mata,
          Namun setiap langkah yang kita ambil,
          Adalah cerita yang kita buat bersama.
          Jangan biarkan bosan merayap,
          Ciptakan harapan di setiap langkah."
        </h3>
      </div>
    </div>
    <div class="carousel-item">
      <div class="carousel-text-box">
        <h3 class="text-center mb-0">
        "Jangan takut untuk memulai dari awal,
        Setiap langkah yang kamu ambil membawa perubahan,
        Keberhasilan bukanlah tentang waktu,
        Tapi tentang ketekunan dan keteguhan hati,
        Teruslah maju, impianmu bisa terwujud."
        </h3>
      </div>
    </div>
    <div class="carousel-item">
      <div class="carousel-text-box">
        <h3 class="text-center mb-0">
        "Setiap rintangan yang datang adalah peluang,
        Untuk membuktikan seberapa kuat dirimu,
        Jangan menyerah hanya karena kesulitan,
        Bangkitlah, hadapi dengan penuh keyakinan,
        Kesuksesan menunggu di ujung jalan."
        </h3>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  
</div>

<!-- Content -->
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Data Peserta</h2>
        <a href="cetak-peserta.php" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>ID Pendaftaran</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require_once('../config.php');
                $no = 1;
                $list_peserta = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran");
                while($row = mysqli_fetch_array($list_peserta)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['id_pendaftaran'] ?></td>
                    <td><?php echo $row['mm_peserta'] ?></td>
                    <td><?php echo $row['jk'] ?></td>
                    <td>
                        <a href="detail-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Detail</a>
                        <a href="hapus-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapusnya?')"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<!-- untuk kata kata -->

<audio id="myAudio" autoplay>
        <source src="../sound/lu pijak.mp3" type="audio/mpeg">
        <source src="../sound/lu pijak.ogg" type="audio/ogg">
    </audio>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var audio = document.getElementById("myAudio");
            audio.onended = function() {
                audio.pause();
                audio.currentTime = 0; // Reset waktu audio ke awal
            }
        });
    </script>

<!-- CSS tambahan -->
<style>
  .carousel-text-box {
    background-color: #007bff;  /* Warna latar belakang biru */
    color: white;  /* Warna teks putih */
    padding: 30px;  /* Padding di sekitar teks */
    border-radius: 10px;  /* Membuat sudut kotak melengkung */
    margin: 0 10px;  /* Memberikan margin kiri dan kanan */
  }

  .carousel-inner {
    padding: 20px;  /* Memberikan padding pada carousel */
  }

  .carousel-item h3 {
    font-size: 1.7rem;  /* Ukuran font sajak */
    font-family: 'Arial', sans-serif;  /* Mengatur font */
  }
</style>

<!-- Tombol Kembali -->
<div class="container my-3">
    <button class="btn btn-secondary" onclick="window.history.back()"><i class="fas fa-arrow-left"></i> Kembali</button>
</div>

<!-- Footer -->
<footer class="bg-light text-center text-lg-start mt-5">
    <div class="container p-4">
        <p class="text-center mb-0">&copy; <?php echo date("Y"); ?> Pondok Informatika. All Rights Reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
