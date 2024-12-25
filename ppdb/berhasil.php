<?php
session_start();

// if (!isset($_SESSION['ssLogin'])) {
//     header("location:../auth/login.php");
//     exit;
// }

$id = $_GET['id'] ?? 'Unknown'; // Ambil ID dari URL
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Bagian box formulir -->
    <section class="box-formulir">
        <h2>Pendaftaran Berhasil</h2>
        <div class="box">
            <h4>Kode pendaftaran Anda adalah: <strong><?php echo htmlspecialchars($id); ?></strong></h4>
            <a href="cetak-bukti.php?id=<?php echo htmlspecialchars($id); ?>" target="_blank" class="btn-cetak">Cetak Bukti Pendaftaran</a>
        </div>
    </section>
</body>
</html>
