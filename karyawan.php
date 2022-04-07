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

$karyawan = query("SELECT * from user inner join karyawan on user.nip = karyawan.nip where karyawan.nip = '$nip'")[0];
$employee = query("SELECT * from  karyawan order by nip asc");

if (isset($_POST["cari"])) {
    $karyawan = cari_karyawan($_POST["keyword"]);
}


if(!$karyawan){
    echo mysqli_error($koneksi);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan</title>
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
        <div class="container-fluid px-4 pb-4">
            <h1 class="mt-4 d-print-none">Karyawan</h1>
            <ol class="breadcrumb mb-4 d-print-none">
                <li class="breadcrumb-item"><a href="index.php"> Dashboard</a></li>
                <li class="breadcrumb-item active">Karyawan</li>
            </ol>
            <h3><button class="btn btn-primary"><a class="text-decoration-none text-white" href="tambah_karyawan.php">Tambah Karyawan</a></button></h3>
        <div class="card mb-4">
            <div class="card-header d-print-none">
                <i class='fas fa-table me-1'></i>
                Data Karyawan
            </div>
        <div class="card-body">
            <table class="shadow-sm table table-bordered table-striped table-sm table-responsive" cellpadding="10" cellspacing="0" id="datatablesSimple">
                <thead class="text-center">
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th width="100px" class="text-center">Action</th>
                </thead>

                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($employee as $row) :?>
                    <tr>
                        <td class="align-middle text-center" width="50px"><?= $i ;?> </td>
                        <td class="align-middle"> <?= $row["nip"]; ?></td>
                        <td class="align-middle"> <?= $row["nama_lengkap"]; ?></td>
                        <td class="align-middle"> <?= $row["jenis_kelamin"]; ?></td>
                        <td class="align-middle d-print-none" width="15%">
                            <button class="btn btn-sm btn-warning"><a class="text-decoration-none text-dark" href="edit_karyawan.php?nip=<?= $row["nip"];?>"><i class="bi-pencil"></i> Edit</a></button> |
                            <button class="btn btn-sm btn-danger"><a class="text-decoration-none text-dark" href="hapus_karyawan.php?nip=<?= $row["nip"];?>" onclick="return confirm('Yakin Hapus?')"><i class="bi-trash"></i> Hapus</a></button>
                        </td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach;?>
                </tbody>
            </table>
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