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

$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];
// menyambungkan db table histori dan table pengecekan
$histori = query("SELECT * from (histori inner join aset on histori.sn_lama = aset.serial_number) inner join karyawan on histori.nip = karyawan.nip");

// search histori
if (isset($_POST["cari"])) {
    $histori = cari_histori($_POST["keyword"]);
}

if (isset($_POST["tgl"])){
    // ambil data dari form
    $tgl_awal = $_POST["tgl_awal"];
    $tgl_akhir = $_POST["tgl_akhir"];
    if (empty($tgl_awal & $tgl_akhir))  {
        echo "<script> alert('Pilih Tanggal Terlebih dahulu'); 
                document.location.href= 'histori.php'; </script>";

    } else if($_POST["tgl"] = 0) {
       echo "Data tidak ada";
    } else {
       $histori = cari_tanggal($_POST["tgl"]); 
    };

}

if(!$histori){
    echo mysqli_error($koneksi);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body class="sb-nav-fixed">
<?php include 'templates/navbar.php'; ?>
<?php if ($level == "admin") {
  include 'templates/sidebar.php'; 
} else if ($level == "support") {
    echo sidebarsup();
} else {
    echo sidebar();
}
?>
<div class="col">
    <div class="row bg-light d-print-none">
        <p class="text-start"> User : <a href="detail_user.php?nip=<?= $karyawan["nip"];?>"><?= $karyawan["nama_lengkap"];?></a> <span class="text-end"> | Level : <?= $karyawan["level"];?> </span> </p> 
        </div>
    <h1 class="mb-3"> Histori Hasil Perubahan</h1><hr>
    <table cellspacing="5" cellpadding="5" class="d-print-none">
        <form action="" method="post">
            <tr>
                <td width="60%">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Masukkan no tag, nama aset, atau kegiatan yang ingin dicari">
                        <button type="submit" class="btn btn-outline-secondary" name="cari">Cari</button>
                    </div>
                </td>
            <td align="right">
            <p>Cari berdasarkan tanggal</p>
            </td>
            <td width="15%">
                <input type="date" name="tgl_awal" class="form-control">
                <input type="date" name="tgl_akhir" class="form-control">
                <button class="input-group-text btn btn-outline-secondary" name="tgl">Cari</button>
            </td>
            </tr>
        </form>
        </table>
        <table class="shadow sm sm table table-bordered border border-2 border-dark table-striped table-sm table-responsive" cellpadding="10" cellspacing="0">
            <thead class="text-center align-middle">
                <th rowspan="2" style="vertical-align: middle;">No</th>
                <th rowspan="2" class="align-middle">Tanggal Pergantian</th>
                <th rowspan="2">Pengecek</th>
                <th colspan="2">Serial Number</th>
                <th colspan="2">No Tag</th>
                <th rowspan="2">Alasan Pergantian</th>
            </thead>
            <thead class="text-center">
                <th></th>
                <th></th>
                <th></th>
                <th>SN Lama</th>
                <th>SN Baru</th>
                <th>No Tag Lama</th>
                <th>No Tag Baru</th>
            </thead>

            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($histori as $row) :?>
                <tr>
                    <td class="align-middle text-center" width="50px"><?= $i ;?> </td>
                    <td class="align-middle"> <?= $row["serial_number"]; ?></td>
                    <td class="align-middle"> <?= $row["nama_lengkap"]; ?></td>
                    <td class="align-middle"> <?= $row["sn_lama"]; ?></td>
                    <td class="align-middle"> <?= $row["sn_baru"]; ?></td>
                    <td class="align-middle"> <?= $row["no_tag_lama"];?></td>
                    <td class="align-middle"> <?= $row["no_tag_baru"]; ?></td>
                    <td class="align-middle"> <?= $row["alasan"]; ?></td>
                </tr>
            <?php $i++; ?>
            <?php endforeach;?>
            </tbody>
        </table>

    
 
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>