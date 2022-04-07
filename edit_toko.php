<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$KD_STORE = $_GET["KD_STORE"];

$store = query("SELECT * from store where KD_STORE = '$KD_STORE'")[0];
$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];

if (isset($_POST["edit"])) {
    if (edit_toko($_POST) > 0) {
        echo " <script>
                alert('Toko Berhasil Diubah!');
                document.location.href = 'lokasi_toko.php';
                </script>
            ";
    } else{
        echo" <script>
            alert('Data gagal diubah karena tidak ada perubahan');
            document.location.href = 'lokasi_toko.php';
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Tambah store</title>
</head>
<body class="sb-nav-fixed">
    <?php 
        include 'templates/navbar.php'; 
        include 'templates/sidebar.php';
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Toko</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php"> Dashboard </a></li>
                    <li class="breadcrumb-item"><a href="lokasi_toko.php"> Data Toko </a></li>
                    <li class="breadcrumb-item active">Edit Toko</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header d-print-none">
                    <i class='fas fa-table me-1'></i>
                    Edit Toko
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="KD_STORE" class="form-label">Kode Toko</label>
                            <input type="text" class="form-control" id="KD_STORE" name="KD_STORE" value="<?= $store["KD_STORE"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="KD_REGION" class="form-label">Kode Region</label>
                            <input type="text" class="form-control" id="KD_REGION" name="KD_REGION" value="<?= $store["KD_REGION"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="KD_BRANCH" class="form-label">Kode Cabang</label>
                            <input type="text" class="form-control" id="KD_BRANCH" name="KD_BRANCH" value="<?= $store["KD_BRANCH"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="NAMA_STORE" class="form-label">Nama store</label>
                            <input type="text" class="form-control" id="NAMA_STORE" name="NAMA_STORE" value="<?= $store["NAMA_STORE"];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="ALIAS" class="form-label">Alias</label>
                            <input type="text" class="form-control" id="ALIAS" name="ALIAS" value="<?= $store["ALIAS"];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="ALAMAT1" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="ALAMAT1" name="ALAMAT1" value="<?= $store["ALAMAT1"];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="ALAMAT2" class="form-label">Kelurahan - Kecamatan</label>
                            <input type="text" class="form-control" id="ALAMAT2" name="ALAMAT2" value="<?= $store["ALAMAT2"];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="ALAMAT3" class="form-label">Kabupaten / Kota</label>
                            <input type="text" class="form-control" id="ALAMAT3" name="ALAMAT3" value="<?= $store["ALAMAT3"];?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="edit">Edit store </button>
                    </form>
            </div>
        </div>
    </div>
</main>
<!-- Tutup div dari sidebar.php -->
</div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>