<?php
session_start();

require_once '../config1.php';

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $delete = mysqli_query($koneksi, "DELETE FROM tbl_pendaftaran WHERE id_pendaftaran = '$id'");
    if ($delete) {
        echo '<script>window.location="data-peserta.php"</script>';
    } else {
        echo '<script>alert("Gagal menghapus data");</script>';
    }
}
?>
