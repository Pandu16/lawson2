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

// ambil serial numbe barang
$id_histori = $_GET["id_histori"];

// query barang berdasarkan serial number
$result = query("SELECT * from histori inner join karyawan on histori.nip = karyawan.nip where id_histori = '$id_histori'")[0];

// Format tangga dan jam 
$date = mysqli_query($koneksi, "SELECT tgl_histori from histori where id_histori = '$id_histori'");
$row = mysqli_fetch_assoc($date);
$tanggal = $row["tgl_histori"];
$hour = mysqli_query($koneksi, "SELECT jam from histori where id_histori = '$id_histori'");
$row = mysqli_fetch_assoc($hour);
$jam = $row["jam"];
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
    <title>Detail Histori</title>
</head>
<body class="sb-nav-fixed">
    <div class="container pb-3 shadow my-3 border">
        <div class="row">
        <h1>Detail Histori</h1>
        <hr>
            <div class="col">
                <table class=" table">
                    <tr>
                        <td>ID Histori</td>
                        <td>:</td>
                        <td><?= $result["id_histori"] ;?></td>
                    </tr>
                    <tr>
                        <td>NIP </td>
                        <td>:</td>
                        <td><?= $result["nip"] ;?></td>
                    </tr>
                    <tr>
                        <td>Nama Karyawan</td>
                        <td>:</td>
                        <td><?= $result["nama_lengkap"] ;?></td>
                    </tr>
                    <tr>
                        <td>SN Lama -> SN Baru</td>
                        <td>:</td>
                        <td><?= $result["sn_lama"].'->'. $result["sn_baru"] ;?></td>
                    </tr>
                    <tr>
                        <td>No Tag Lama -> No Tag Baru</td>
                        <td>:</td>
                        <td><?= $result["no_tag_lama"]. '->'. $result["no_tag_baru"] ;?></td>
                    </tr>
                    <tr>
                        <td>Nama Aset</td>
                        <td>:</td>
                        <td><?= $result["nama_aset"];?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Perubahan</td>
                        <td>:</td>
                        <td><?= date("l, d F Y", strtotime($tanggal)). ' / ' . date("G:i", strtotime($jam)) ;?></td>
                    </tr>
                    <tr>
                        <td>Keterangan Perubahan</td>
                        <td>:</td>
                        <td><?= $result["alasan"] ;?></td>
                    </tr>
                </table>
                <a class="mt-3" href="history.php"><button class="btn btn-primary d-print-none">  Kembali </button></a>
            </div>
            <div class="col">
                Surat Jalan : <br>
                <a target="_blank" href="img/<?= $result["gambar"];?>"><img src="img/<?= $result["gambar"];?>" width="100%"></a><br>
            </div>
        </div>
    </div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>