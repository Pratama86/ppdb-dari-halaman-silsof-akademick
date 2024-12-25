<?php
session_start();
// Include file konfigurasi
require_once "../config1.php";

// Judul halaman
$title = "Tambah User - Pondok Informatika";

// Mendapatkan pesan dari parameter URL (jika ada)
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

// Variabel untuk menampilkan alert
$alert = '';
if ($msg == 'cancel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-xmark"></i> Tambah user gagal, username sudah ada.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-xmark"></i> Tambah user gagal, file yang Anda upload bukan gambar.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-xmark"></i> Tambah user gagal, ukuran gambar maksimal 1MB.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check"></i> Tambah user berhasil, segera login ke akun Anda Semua kata sandi sudah dienkripsi Yaitu [1234].
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>

<style>
/* Global Styles */
/* Global Styles *//* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    line-height: 1.6;
}

.container-fluid {
    max-width: 1100px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    text-align: center;
    color: #444;
}

.card {
    border: none;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.card-header {
    background-color:rgb(219, 219, 219);
    color: #333;
    padding: 15px;
    border-bottom: 1px solid #ddd;
    font-size: 1.2rem;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 8px 8px 0 0;
}

.card-header .button {
    justify-content: flex-end;
}

.card-body {
    padding: 20px;
}

.alert {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    font-size: 0.95rem;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-warning {
    background-color: #fff3cd;
    color: #856404;
}

.form-control, .form-select, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
}

.form-control:focus, .form-select:focus, textarea:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
}

textarea {
    resize: vertical;
}

button {
    padding: 10px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button.btn-primary {
    background-color: #007bff;
    color: #fff;
    margin-left: 10px;
}

button.btn-primary:hover {
    background-color: #0056b3;
}

button.btn-danger {
    background-color: #dc3545;
    color: #fff;
}

button.btn-danger:hover {
    background-color: #c82333;
}

#previewImage {
    display: block;
    margin: 0 auto 15px;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #ddd;
}

#imageInput {
    margin-top: 10px;
}

.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.col-8 {
    flex: 2;
}

.col-4 {
    flex: 1;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }
    #previewImage {
        width: 120px;
        height: 120px;
    }
    button {
        width: 100%;
        margin-bottom: 10px;
    }
}
/* Tombol di sebelah kanan halaman */
.to-right {
    position: absolute;
    right: 20px; /* Jarak dari sisi kanan */
    bottom: 20px; /* Jarak dari bawah */
}

.to-right a {
    display: inline-block;
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    background-color: #28a745; /* Warna hijau */
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.to-right a:hover {
    background-color: #218838; /* Warna hijau lebih gelap saat hover */
}



</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah User</h1>
            <form action="proses-user.php" method="POST" enctype="multipart/form-data">
                <?php if ($msg !== '') echo $alert; ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah User</span>
                        <div class="button">
                            <button type="reset" class="btn btn-danger float-end me-1" name="reset">
                                <i class="fa-solid fa-xmark"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary float-end" name="simpan">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf dan angka" class="form-control" id="username" name="username" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-10">
                                        <select name="jabatan" id="jabatan" class="form-select" required>
                                            <option value="" selected>--Pilih Jabatan--</option>
                                            <option value="Calon Siswa">Calon Siswa</option>
                                            <option value="kepsek">Kepsek</option>
                                            <option value="staf_tu">Staf TU</option>
                                            <option value="guru">Guru Mata Pelajaran</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <img id="previewImage" src="../asset/image/default.png" alt="gambar user" class="mb-3">
                                <input type="file" id="imageInput" name="image" class="form-control" accept="image/png, image/jpg, image/jpeg" required>
                                <small class="text-secondary">Pilih gambar PNG, JPG, atau JPEG dengan ukuran maksimal 1MB</small>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Tombol Ke Halaman Login -->
            <div class="to-right">
                <a href="http://localhost/sekolah/auth/login.php">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Ke Halaman Login
                </a>
            </div>
        </div>
    </main>
</div>



