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

$id_aset = $_GET["id_aset"];

$tipe = query("SELECT * from tipe");
$store = query("SELECT * from store");
$ruangan = query("SELECT * from ruangan");
$aset = query("SELECT * from (((aset inner join store on aset.KD_STORE = store.KD_STORE) 
                inner join tipe on aset.id_tipe = tipe.id_tipe)
                inner join ruangan on aset.id_ruang = ruangan.id_ruang)
                where id_aset = '$id_aset'")[0];
$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];

if (isset($_POST["submit"])) {
    if (edit_aset($_POST) > 0) {
        echo " <script>
                alert('Aset Berhasil Diedit!');
                document.location.href = 'aset.php';
                </script>
            ";
    } else {
        echo" <script>
            alert('Data gagal diubah karena tidak ada perubahan');
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
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Tambah Aset</title>
</head>
<body class="sb-nav-fixed">
    <?php include 'templates/navbar.php'; 
        if ($level == 'admin'){
            include 'templates/sidebar.php';
        }
    ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 pb-4">
            <h1 class="mt-4 d-print-none">Edit Aset</h1>
            <ol class="breadcrumb mb-4 d-print-none">
                <li class="breadcrumb-item"><a href="index.php"> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="aset.php"> Data Aset</a></li>
                <li class="breadcrumb-item active">Edit Aset</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-print-none">
                    Edit Aset
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" value="<?= $id_aset;?>">
                    <div class="mb-3">
                        <label for="serial_number" class="form-label">SN Aset</label>
                        <input type="text" class="form-control  shadow-sm" id="serial_number" name="serial_number" value="<?= $aset["serial_number"] ;?>">
                    </div>
                    <div class="mb-3">
                        <label for="no_tag" class="form-label">No Tag</label>
                        <input type="text" class="form-control  shadow-sm" id="no_tag" name="no_tag" value="<?= $aset["no_tag"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_aset" class="form-label">Nama Aset</label>
                        <input type="text" class="form-control  shadow-sm" id="nama_aset" name="nama_aset" value="<?= $aset["nama_aset"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="id_tipe" class="form-label">Tipe Aset</label>
                        <select class="form-select shadow-sm" name="id_tipe" id="id_tipe" required>
                            <option value="<?= $aset["id_tipe"] ;?>" hidden><?= $aset["nama_tipe"] ;?></option>
                            <?php foreach($tipe as $row) : ?>
                            <option value="<?= $row["id_tipe"];?> "> <?= $row["nama_tipe"];?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="merk_aset" class="form-label">Merk Aset</label>
                        <input type="text" class="form-control  shadow-sm" id="merk_aset" name="merk_aset" value="<?= $aset["merk_aset"];?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp. </span>
                        <input type="text" class="form-control" placeholder="Masukkan Harga" value="<?= $aset["harga"];?>" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="spesifikasi" class="form-label">Spesifikasi</label>
                        <input type="text" class="form-control  shadow-sm" id="spesifikasi" name="spesifikasi" value="<?= $aset["spesifikasi"];?>">
                    </div>
                    <div class="row">
                    <div class="col mb-3">
                        <label for="KD_STORE" class="form-label">Toko</label>
                        <select class="form-select shadow-sm" name="KD_STORE" id="" required>
                            <option value="<?= $aset["KD_STORE"] ;?>" hidden><?= $aset["NAMA_STORE"] ;?></option>
                            <?php foreach($store as $row) : ?>
                                <option value="<?= $row["KD_STORE"];?>"> <?= $row["NAMA_STORE"];?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="id_ruang" class="form-label">Ruangan</label>
                        <select class="form-select shadow-sm" name="id_ruang" id="" required>
                            <option value="<?= $aset["id_ruang"] ;?>" hidden> <?= $aset["nama_ruang"] ;?> </option>
                            <?php foreach($ruangan as $row) : ?>
                                <option value="<?= $row["id_ruang"];?>"> <?= $row["nama_ruang"];?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select shadow-sm" name="kondisi" id="kondisi">
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Edit Aset!</button>
                </form>
            </div>
        </div>
    </div>
    </main>
</div>
</div>
</div>
     
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="assets/js/datatables-simple-demo.js"></script>

</body>
</html>