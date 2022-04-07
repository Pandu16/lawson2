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
if(!$karyawan){
    echo mysqli_error($koneksi);
}

// ambil tanggal hari ini
$tgl = date("Y-m-d");

// query
$pengecekan = query("SELECT * from (pengecekan inner join store on pengecekan.kd_store = store.KD_STORE) inner join karyawan on pengecekan.nip = karyawan.nip  where tgl_cek = '$tgl'");
$aset = query("SELECT * from aset");
$store = query("SELECT * from store");
$rusak = query("SELECT * from ((aset inner join store on aset.kd_store = store.KD_STORE) inner join ruangan on aset.id_ruang = ruangan.id_ruang) inner join tipe on aset.id_tipe = tipe.id_tipe where kondisi = 'rusak' ");
$ringkasan = mysqli_query($koneksi, "SELECT ALAMAT3, NAMA_STORE, count(*) from store inner join aset on aset.kd_store = store.KD_STORE group by store.KD_STORE");

if(!$pengecekan){
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
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <form action="" method="POST">
            <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <button class="btn btn-sm btn-primary" name="hari">
                            <div class="card-body">Pengecekan Hari ini </div>
                            <div class="card-footer align-items-center justify-content-between">
                                    <div class="text-white fs-4 text-center"> <?= count($pengecekan);?> </i></div>
                                </div>
                        </button>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <button class="btn btn-sm btn-warning text-white" name="toko">
                                <div class="card-body">Jumlah Toko</div>
                                <div class="card-footer align-items-center justify-content-between">
                                    <div class="text-white fs-4 text-center"> <?= count($store);?> </i></div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <button class="btn btn-sm btn-success" name="aset">
                                <div class="card-body">Jumlah Aset </div>
                                <div class="card-footer align-items-center justify-content-between">
                                    <div class="text-white fs-4 text-center"> <?= count($aset);?> </i></div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <button class="btn btn-sm btn-danger" name="rusak">
                                <div class="card-body">Jumlah Aset Rusak</div>
                                <div class="card-footer align-items-center justify-content-between">
                                    <div class="text-white fs-4 text-center"> <?= count($rusak);?> </i></div>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            
    <div class="row">
        <div class="col-sm-12">
<?php if (isset($_POST["hari"])): ?>
    <div class='card mb-4'>
        <div class='card-header'>
            <i class='fas fa-table me-1'></i>
            Pengecekan Hari Ini
        </div>
        <div class='card-body'>
            <table id='datatablesSimple'>
                <thead>
                    <tr>
                        <th width='5px'>No</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Nama Store</th>
                        <th class="text-center">Nama Aset</th>
                        <th class="text-center">Spesifikasi </th>
                        <th class="text-center">Kegiatan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Nama Store</th>
                        <th class="text-center">Nama Aset</th>
                        <th class="text-center">Spesifikasi </th>
                        <th class="text-center">Kegiatan</th>
                    </tr>
                </tfoot>
                <tbody>
        <?php $i = 1;
        foreach ($pengecekan as $row) : ?>
                <tr>
                    <td class='text-center'> <?= $i;?> </td>
                    <td> <?= $row["nama_lengkap"];?> </td>
                    <td class='text-center'> <?= $row["NAMA_STORE"];?> </td>
                    <td class='text-center'> <?= $row["nama_aset"];?></td>
                    <td class='text-center'> <?= $row["spesifikasi"];?></td>
                    <td class='text-center'> <?= $row["kegiatan"];?></td>
                </tr>
            <?php $i++; endforeach ;?>
                </tbody>       
                    </table>
                    </div>
                    </div>
        <?php endif; 
if (isset($_POST["toko"])): ?>
    <div class='card mb-4'>
        <div class='card-header'>
            <i class='fas fa-table me-1'></i>
            Data Toko 
        </div>
        <div class='card-body'>
            <table id='datatablesSimple'>
                <thead>
                    <tr>
                        <th width='5px'>No</th>
                        <th width='130px'>Kode Store</th>
                        <th class="text-center">Nama Store</th>
                        <th class="text-center">Alamat</th>
                        <th>Kota</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Store</th>
                        <th>Nama Store</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                    </tr>
                </tfoot>
                <tbody>
        <?php $i = 1;
        foreach ($store as $row) : ?>
                <tr>
                    <td class='text-center'> <?= $i;?> </td>
                    <td> <?= $row["KD_STORE"];?> </td>
                    <td> <?= $row["NAMA_STORE"];?> </td>
                    <td class='text-center'> <?= $row["ALAMAT1"], $row["ALAMAT2"] ;?> </td>
                    <td class='text-center'> <?= $row["ALAMAT3"];?></td>
                </tr>
            <?php $i++; endforeach ;?>
                </tbody>       
                    </table>
                    </div>
                    </div>
        <?php endif;
        
if (isset($_POST["rusak"])): ?>
    <div class='card mb-4'>
        <div class='card-header'>
            <i class='fas fa-table me-1'></i>
            Data Aset yang rusak
        </div>
        <div class='card-body'>
            <table id='datatablesSimple'>
                <thead>
                    <tr>
                        <th width='5px'>No</th>
                        <th class="text-center">SN</th>
                        <th class="text-center">Nama Aset</th>
                        <th class="text-center">Jenis Aset</th>
                        <th class="text-center">Toko </th>
                        <th class="text-center">Ruangan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Toko</th>
                        <th>Kota</th>
                        <th>Jumlah</th>
                    </tr>
                </tfoot>
                <tbody>
        <?php $i = 1;
        foreach ($rusak as $row) : ?>
                <tr>
                    <td class='text-center'> <?= $i;?> </td>
                    <td> <?= $row["serial_number"];?> </td>
                    <td class='text-center'> <?= $row["nama_aset"];?> </td>
                    <td class='text-center'> <?= $row["nama_tipe"];?></td>
                    <td class='text-center'> <?= $row["NAMA_STORE"];?></td>
                    <td class='text-center'> <?= $row["nama_ruang"];?></td>
                </tr>
            <?php $i++; endforeach ;?>
                </tbody>       
                    </table>
                    </div>
                    </div>
        <?php endif; 

if (isset($_POST["aset"])): ?>
<div class='card mb-4'>
    <div class='card-header'>
        <i class='fas fa-table me-1'></i>
        Data Aset yang dimiliki
    </div>
    <div class='card-body'>
        <table id='datatablesSimple'>
            <thead>
                <tr>
                    <th width='5px'>No</th>
                    <th>Toko</th>
                    <th>Kota</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Toko</th>
                    <th>Kota</th>
                    <th>Jumlah</th>
                </tr>
            </tfoot>
            <tbody>
    <?php $i = 1;
    foreach ($ringkasan as $row) : ?>
            <tr>
                <td class='text-center'> <?= $i;?> </td>
                <td> <?= $row["NAMA_STORE"];?> </td>
                <td class='text-center'> <?= $row["ALAMAT3"];?>] </td>
                <td class='text-center'> <?= $row["count(*)"];?></td>
            </tr>
        <?php $i++; endforeach ;?>
            </tbody>       
                </table>
                </div>
                </div>
    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-light text-center">
        &copy; 2021
    </footer>
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