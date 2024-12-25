<?php

// session_start();
// if (!isset($_SESSION['ssLogin'])) {
//     header("location: ../auth/login.php");
//     exit;
// }

require_once "../config.php";

// Jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $username = trim(htmlspecialchars($_POST['username']));
    $nama = trim(htmlspecialchars($_POST['name']));
    $jabatan = $_POST['jabatan'];
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $gambar = $_FILES['image']['name'];
    $password = '1234'; // Default password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $cekUsername = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'");
    if (mysqli_num_rows($cekUsername) > 0) {
        header("location:add-user.php?msg=cancel");
        exit;
    }

    // Upload gambar
    if ($gambar != null) {
        $gambar = uploadimg("add-user.php");
    } else {
        $gambar = 'default.png';
    }

    // Simpan data ke database
    $sql = "INSERT INTO tbl_user (username, password, nama, jabatan, alamat, foto) 
            VALUES ('$username', '$hashedPassword', '$nama', '$jabatan', '$alamat', '$gambar')";

    if (mysqli_query($koneksi, $sql)) {
        header("location:add-user.php?msg=added");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
