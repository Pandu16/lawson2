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
$id_pengecekan = $_GET["id_pengecekan"];

// query barang berdasarkan serial number
$result = query("SELECT * from (((pengecekan inner join store on pengecekan.kd_store = store.KD_STORE)
                inner join tipe on pengecekan.id_tipe = tipe.id_tipe)
                inner join ruangan on pengecekan.id_ruang = ruangan.id_ruang)
                inner join karyawan on pengecekan.nip = karyawan.nip
                where id_pengecekan = '$id_pengecekan'")[0];
                
$date = mysqli_query($koneksi, "SELECT tgl_cek from pengecekan where id_pengecekan = '$id_pengecekan' ");
$row = mysqli_fetch_assoc($date);
$tanggal = $row["tgl_cek"];

if (isset($_POST["print"])) {
    detailpdf();
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
    <title>Detail Pengecekan</title>
</head>
<body class="sb-nav-fixed">
    <div class="container pb-3 shadow my-3 border border-secondary">
        <div class="row">
        <h1>Detail Pengecekan</h1>
        <hr class="py-0 bg-dark">
            <div class="col">
            <table class="table">
                    <tr>
                        <td>Waktu Pengecekan</td>
                        <td>:</td>
                        <td><?= date("l, d F Y", strtotime($tanggal)) . ' / ' . $result["jam_cek"] ;?></td>
                    </tr>
                    <tr>
                        <td>ID Pengecekan</td>
                        <td>:</td>
                        <td><?= $result["id_pengecekan"] ;?></td>
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
                        <td>Serial Number</td>
                        <td>:</td>
                        <td><?= $result["serial_number"];?></td>
                    </tr>
                    <tr>
                        <td>No Tag</td>
                        <td>:</td>
                        <td><?= $result["no_tag"];?></td>
                    </tr>
                    <tr>
                        <td>Nama Aset</td>
                        <td>:</td>
                        <td><?= $result["nama_aset"] ;?></td>
                    </tr>
                    <tr>
                        <td>Tipe Aset</td>
                        <td>:</td>
                        <td><?= $result["nama_tipe"] ;?></td>
                    </tr>
                    <tr>
                        <td>Merk Aset</td>
                        <td>:</td>
                        <td><?= $result["merk_aset"] ;?></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td>Rp. <?= number_format($result["harga"],0,',','.') ;?></td>
                    </tr>
                    <tr>
                        <td>Spesifikasi</td>
                        <td>:</td>
                        <td><?= $result["spesifikasi"] ;?></td>
                    </tr>
                    <tr>
                        <td>Kondisi</td>
                        <td>:</td>
                        <td><?= $result["kondisi"] ;?></td>
                    </tr>
                    <tr>
                        <td>Kegiatan</td>
                        <td>:</td>
                        <td><?= $result["kegiatan"] ;?></td>
                    </tr>
                    <tr>
                        <td>Toko</td>
                        <td>:</td>
                        <td><?= $result["NAMA_STORE"] ;?></td>
                    </tr>
                    <tr>
                        <td>Ruangan</td>
                        <td>:</td>
                        <td><?= $result["nama_ruang"] ;?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $result["ALAMAT1"]. ', '. $result["ALAMAT2"] ;?></td>
                    </tr>
                </table>
            </div>
            <div class="col d-grip gap-2 mx-auto border-start">
                <label for="">Foto Kegiatan:</label>
                <a target="_blank" href="img/<?= $result["gambar"];?>"> <img src="img/<?= $result["gambar"];?>" alt="" width="100%"> </a>
                <hr>
                <div class="row">
                    <div class="col">
                <a class="text-start align-center" href="laporan.php"><button class="btn btn-primary">  Kembali </button></a>
                <a class="text-end align-center" href="hapus_pengecekan.php?id_pengecekan=<?= $result["id_pengecekan"].'&gambar='.$result["gambar"];?> "><button class="btn btn-danger" onclick="return confirm('Yakin Hapus?')">  Hapus </button></a>
                </div>
                <div class="col">
                <form action="" method="POST">
                    <input type="text" name="id_pengecekan" value="<?= $id_pengecekan ;?>" hidden>
                    <button class="align-center btn btn-success" type="submit" name="print"> Print </button>
                </form>
                </div>
            </div>
        </div>
    </div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>