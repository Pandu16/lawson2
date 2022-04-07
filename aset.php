<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// panggil file functions
require 'functions.php';

$aset = query("SELECT * from (aset inner join store on aset.kd_store = store.KD_STORE) 
        inner join tipe on aset.id_tipe = tipe.id_tipe order by serial_number asc");

$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];



if (!$aset) {
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
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Assets</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <script>
    $(function() {
        $("#aset").autocomplete({
            minLength: 2,
            source: "ajax/cekaset.php",
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
        <h1 class="mt-4">Data Aset</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Aset</li>
            </ol>
        <div class='card mb-4'>
            <div class='card-header'>
                <i class='fas fa-table me-1'></i>
                Data Aset
            </div>
            <div class='card-body'>
            <button class="btn btn-primary mb-3 d-print-none"> <a class="text-decoration-none text-light" href="tambah_aset.php"> + Aset Baru </a></button>
                <table id='datatablesSimple'>
                    <thead class="text-center align-middle">
                        <th class="text-center">No</th>
                        <th class="text-center">SN</th>
                        <th class="text-center">No Tag</th>
                        <th class="text-center">Nama Aset</th>
                        <th class="text-center">Merk Aset</th>
                        <th class="text-center"> Tipe Aset </th>
                        <th class="text-center">Toko</th>
                        <th class="text-center">Spesifikasi</th>
                        <th class="text-center">Kondisi</th>
                        <th class="text-center" class="d-print-none">Action</th>
                    </thead>
                    <tfoot>
                        <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">SN</th>
                        <th class="text-center">No Tag</th>
                        <th class="text-center">Nama Aset</th>
                        <th class="text-center">Merk Aset</th>
                        <th class="text-center"> Tipe Aset </th>
                        <th class="text-center">Toko</th>
                        <th class="text-center">Spesifikasi</th>
                        <th class="text-center">Kondisi</th>
                        <th class="text-center" class="d-print-none">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($aset as $row):?>
                    <tr>
                        <td class="align-middle text-center"><?= $i ;?></td>
                        <td class="align-middle"><?= $row["serial_number"];?></td>
                        <td class="align-middle"><?= $row["no_tag"];?></td>
                        <td class="align-middle"><?= $row["nama_aset"];?></td>
                        <td class="align-middle"><?= $row["merk_aset"];?></td>
                        <td class="align-middle"><?= $row["nama_tipe"];?></td>
                        <td class="align-middle"><?= $row["NAMA_STORE"];?></td>
                        <td width="20%" class="align-middle"><?= $row["spesifikasi"];?></td>
                        <td class="align-middle"><?= $row["kondisi"];?></td>
                        <td width="150px" class="align-middle d-print-none">
                            <button class="btn btn-sm btn-warning"><a class="text-decoration-none text-dark" href="edit_aset.php?id_aset=<?= $row["id_aset"];?>"><i class="bi-pencil"></i> </a></button> |
                            <button class="btn btn-sm btn-danger"><a class="text-decoration-none text-dark" href="hapus_aset.php?id_aset=<?= $row["id_aset"];?>" onclick="return confirm('Yakin Hapus?')"><i class="bi-trash"></i> </a></button> |
                            <button class="btn btn-sm btn-success"><a class="text-decoration-none text-dark" href="mutasi_aset.php?id_aset=<?= $row["id_aset"];?>&serial_number=<?= $row["serial_number"];?>&no_tag=<?= $row["no_tag"];?> "><i class="bi bi-arrow-left-right"></i> </a></button>
                        </td>
                    </tr>
                    <?php $i++ ;?>
                    <?php endforeach;?>
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