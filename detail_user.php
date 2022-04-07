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

// ambil nip
$user = $_GET["nip"];

// query karyawan berdasarkan nip
$result = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip'")[0];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body class="sb-nav-fixed">
    <div class="container pb-3 shadow border border-dark border-1 my-4">
        <div class="row">
        <h1>Detail User</h1>
                <hr>
            <div class="col my-3">
                NIP : <?= $result["nip"]; ?> <br>
                Nama : <?= $result["nama_lengkap"]; ?> <br>
                Level : <?= $result["level"];?> <br>
                Jenis Kelamin : <?= $result["jenis_kelamin"]; ?> <br>
            </div>
            <div class="col">
                <a href="index.php"><button class="btn btn-primary">  Kembali </button></a>
                <a href="edit_karyawan.php?nip=<?= $result["nip"];?>"><button class="btn btn-warning">  Edit </button></a>
            </div>
        </div>
    </div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>