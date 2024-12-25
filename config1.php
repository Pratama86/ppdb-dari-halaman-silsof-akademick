<?php

// Koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "db_sekolah");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// URL induk
$main_url = "http://localhost/sekolah_ppdb/";

// Fungsi untuk upload gambar
function uploadimg($url) {
    $namefile = $_FILES['image']['name'];
    $ukuran = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmp = $_FILES['image']['tmp_name'];

    // Cek file yang diupload
    $validExtension = ['png', 'jpg', 'jpeg'];
    $fileExtension = explode('.', $namefile);
    $fileExtension = strtolower(end($fileExtension));

    if (!in_array($fileExtension, $validExtension)) {
        header("location:" . $url . "?msg=notimage");
        die;
    }

    // Cek ukuran gambar
    if ($ukuran > 1000000) {
        header("location:" . $url . "?msg=oversize");
        die;
    }

    // Generate nama file gambar
    if ($url == "profile-sekolah.php") {
        $namefilebaru = rand(0, 50) . '.bgLogin.' . $fileExtension;
    } else {
        $namefilebaru = rand(10, 100) . '.' . $namefile;
    }

    // Upload gambar
    move_uploaded_file($tmp, '../asset/image/' . $namefilebaru);
    return $namefilebaru;
}
