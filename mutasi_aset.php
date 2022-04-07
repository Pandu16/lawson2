<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$id_aset = $_GET["id_aset"];
$serial_number = $_GET["serial_number"];
$no_tag = $_GET["no_tag"];

if (!$serial_number){
    echo " <script>
                alert('Silahkan pilih aset terlebih dahulu!');
                document.location.href = 'aset.php';
                </script>
            ";
}
require 'functions.php';
date_default_timezone_set("Asia/Jakarta");

$tgl_histori = date("Y-m-d");
$jam = date("H:i:s");

$aset = query("SELECT * from (((aset inner join store on aset.kd_store = store.KD_STORE) 
                inner join tipe on aset.id_tipe = tipe.id_tipe)
                inner join ruangan on aset.id_ruang = ruangan.id_ruang)
                where id_aset = $id_aset")[0];

$tipe = query("SELECT * from tipe");
$store = query("SELECT * from store");
$ruangan = query("SELECT * from ruangan");
$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];

if (isset($_POST["submit"])) {
    if (mutasi_aset($_POST) > 0) {
        echo " <script>
                alert('Aset Berhasil Dimutasi!');
                document.location.href = 'aset.php';
                </script>
            ";
    } else{
        echo" <script>
            alert('Data gagal dimutasi karena SN / No Tag sudah ada! \\nSilahkan coba lagi');
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
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Mutasi Aset</title>
</head>
<body class="sb-nav-fixed">
<?php include 'templates/navbar.php'; 
        include 'templates/sidebar.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 pb-4">
            <h1 class="mt-4 d-print-none">Mutasi Aset</h1>
            <ol class="breadcrumb mb-4 d-print-none">
                <li class="breadcrumb-item"><a href="index.php"> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="aset.php"> Data Aset</a></li>
                <li class="breadcrumb-item active">Mutasi Aset</li>
            </ol>
    <div class="card mb-4">
        <div class="card-header d-print-none">
            Mutasi aset
        </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="tgl_histori" value="<?= $tgl_histori;?>">
            <input type="hidden" name="jam" value="<?= $jam;?>">
            <input type="hidden" name="id_aset" value="<?= $id_aset;?>">
            <div class="mb-3">
                <label for="nip" class="form-label">NIP Karyawan</label>
                <input type="text" class="form-control  shadow-sm" id="nip" name="nip" value="<?= $nip ;?>" required readonly>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="serial_number_lama" class="form-label">Serial Number Lama</label>
                    <input type="text" class="form-control  shadow-sm" id="serial_number_lama" name="serial_number_lama" value="<?= $serial_number;?>" readonly required>
                </div>
                <div class="mb-3 col">
                    <label for="serial_number_baru" class="form-label">Serial Number Baru</label>
                    <input type="text" class="form-control  shadow-sm" id="serial_number_baru" name="serial_number_baru" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="no_tag_lama" class="form-label">No Tag Lama</label>
                    <input type="text" class="form-control  shadow-sm" id="no_tag_lama" name="no_tag_lama" value="<?= $no_tag; ?>" readonly required>
                </div>
                <div class="mb-3 col">
                    <label for="no_tag_baru" class="form-label">No Tag baru</label>
                    <input type="text" class="form-control  shadow-sm" id="no_tag_baru" name="no_tag_baru" required>
                </div>
            </div>
            <div class="mb-3">
                    <label for="nama_aset" class="form-label">Nama Aset</label>
                    <input type="text" class="form-control  shadow-sm" id="nama_aset" name="nama_aset" value="<?= $aset["nama_aset"];?>" required>
            </div>
            <div class="mb-3">
                <label for="id_tipe" class="form-label">Tipe Aset</label>
                <select class="form-select shadow-sm" name="id_tipe" id="id_tipe">
                    <option selected value="<?= $aset["id_tipe"];?>" hidden><?= $aset["nama_tipe"];?></option>
                    <?php foreach($tipe as $row) : ?>
                    <option value="<?= $row["id_tipe"];?>"><?= $row["nama_tipe"] ;?> </option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label for="merk_aset" class="form-label">Merk Aset</label>
                <input type="text" class="form-control  shadow-sm" id="merk_aset" name="merk_aset" value="<?= $aset["merk_aset"];?>" required>
            </div>
            <div class="mb-3">
                <label for="spesifikasi" class="form-label">Spesifikasi</label>
                <textarea class="form-control  shadow-sm" id="spesifikasi" name="spesifikasi" required><?= $aset["spesifikasi"];?></textarea>
            </div>
            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <select class="form-select shadow-sm" name="kondisi" id="kondisi">
                <option selected value="<?= $aset["kondisi"];?>" hidden><?= $aset["kondisi"];?></option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                </select>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="KD_STORE" class="form-label">Toko</label>
                    <select class="form-select shadow-sm" name="KD_STORE" id="KD_STORE">
                        <?php foreach($store as $row) : ?>
                            <option value="<?= $aset["KD_STORE"];?>" selected hidden><?= $aset["NAMA_STORE"];?></option>
                        <option value="<?=$row["KD_STORE"];?>"> <?= $row["NAMA_STORE"];?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="id_ruang" class="form-label">Ruangan</label>
                    <select class="form-select shadow-sm" name="id_ruang" id="">
                        <?php foreach($ruangan as $row) : ?>
                            <option value="<?= $aset["id_ruang"];?>"  selected hidden><?= $aset["nama_ruang"];?> </option>
                        <option value="<?=$row["id_ruang"];?>"><?= $row["nama_ruang"];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="alasan" class="form-label">Keterangan Perubahan</label>
                <input type="text" class="form-control  shadow-sm" id="alasan" name="alasan" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Surat Jalan</label>
                <input type="file" class="form-control  shadow-sm" id="gambar" name="gambar" required>
            </div>
            <input type="hidden" name="KD_STORE" value="<?= $aset["KD_STORE"] ;?>">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    </div>
</div>
</main>
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