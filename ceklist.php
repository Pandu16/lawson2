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

$lokasi = query("SELECT * from store");

$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];

if (isset($_POST["cari"])) {
    $lokasi = cari($_POST["keyword"]);
}

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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Lokasi Toko</title>
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
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php'; 
?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Silahkan Pilih Toko</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pilih Toko</li>
                </ol>
                <div class='card mb-4'>
                    <div class='card-header'>
                        <i class='fas fa-table me-1'></i>
                        Pilih Toko
                    </div>
                <div class="card-body">
                    <form action="" method="get">
                    <table class="shadow-sm table table-bordered table-striped" id="datatablesSimple">  
                        <thead class="text-center">
                            <th>No</th>
                            <th>Nama Toko</th>
                            <th>Kota</th>
                            <th>Alamat</th>
                            <th width="100px">Actions</th>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($lokasi as $row) : ?>
                            <tr class="align-middle">
                                <td width="5px" class="text-center"><?= $i ; ?></td>
                                <td><?= $row["NAMA_STORE"] ; ?></td>
                                <td><?= $row["ALAMAT3"];?></td>
                                <td><?= $row["ALAMAT1"]. ', '. $row["ALAMAT2"] ;?></td>
                                <td class="d-grid">
                                <button class="btn btn-primary btn-sm d-grid"><a class="text-light text-decoration-none" href="pengecekan.php?KD_STORE=<?= $row["KD_STORE"] ;?>">  Cek </a></button>    
                                </td>
                            </tr>
                            <?php $i++ ;?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </form>
                </div>
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