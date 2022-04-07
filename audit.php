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

$lokasi = query("SELECT * from lokasi");

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
</head>
<body class="sb-nav-fixed">
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php'; 
?>
    <div class="col">
    
            <h1 class="mb-3 align-center"> Silahkan Pilih Lokasi Toko Terlebih Dahulu</h1>
            <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword">
                <button type="submit" class="btn btn-outline-secondary" name="cari">Cari Lokasi</button>
            </div>
            </form>

            <form action="" method="get">
            <table class="shadow sm sm table table-bordered table-striped">  
                <thead class="text-center">
                    <th>No</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat</th>
                    <th width="100px">Actions</th>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($lokasi as $row) : ?>
                    <tr class="align-middle">
                        <td width="5px" class="text-center"><?= $i ; ?></td>
                        <td><?= $row["nama_lokasi"] ; ?></td>
                        <td><?= "#"?></td>
                        <td class="d-grid">
                        <button class="btn btn-primary btn-sm d-grid"><a class="text-light text-decoration-none" href="pengecekan.php?id_lokasi=<?= $row["id_lokasi"] ;?>">  Cek </a></button>    
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
</div>

 
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>