<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];

require 'functions.php';

// menyambungkan db table lokasi dan table pengecekan
$lokasi = query("SELECT * from store");

$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];

if(!$lokasi){
    echo mysqli_error($koneksi);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Toko</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <script>
    $(function() {
        $("#toko").autocomplete({
            minLength: 2,
            source: "ajax/toko.php",
        });
    });
    </script>
</head>
<body class="sb-nav-fixed">
<?php include 'templates/navbar.php'; ?>
<?php include 'templates/sidebar.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <h1 class="mt-4">Data Toko</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Toko</li>
            </ol>
        <div class='card mb-4'>
            <div class='card-header'>
                <i class='fas fa-table me-1'></i>
                Data Toko 
            </div>
            <div class='card-body'>
                <button class="btn btn-primary mb-2"><a class="text-white text-decoration-none" href="tambah_toko.php">+ Toko Baru</a></button>
                <table id='datatablesSimple'>
                    <thead>
                        <tr>
                            <th width='5px'>No</th>
                            <th width='130px'>Kode Store</th>
                            <th class="text-center">Nama Store</th>
                            <th>Kota</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Action</th>
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
            foreach ($lokasi as $row) : ?>
                    <tr>
                        <td class='text-center'> <?= $i;?> </td>
                        <td> <?= $row["KD_STORE"];?> </td>
                        <td> <?= $row["NAMA_STORE"];?> </td>
                        <td class='text-center'> <?= $row["ALAMAT3"];?></td>
                        <td class='text-center'> <?= $row["ALAMAT1"], $row["ALAMAT2"] ;?> </td>
                        <td class="align-right text-center" width="200px">
                            <button class="btn btn-warning" name="edit" width="50px"><a class="text-light text-decoration-none" href="edit_toko.php?KD_STORE=<?= $row["KD_STORE"];?>"><i class="bi-pencil"></i> </a></button>
                            <button class="btn btn-danger" name="hapus" width="50px"><a class="text-light text-decoration-none" href="hapus_toko.php?KD_STORE=<?= $row["KD_STORE"];?>" onclick="return confirm('Yakin Hapus?')" ><i class="bi-trash-fill"></i></a></button>
                        </td>
                    </tr>
                <?php $i++; endforeach ;?>
                    </tbody>       
                </table>
            </div>
        </div>
    </main>
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