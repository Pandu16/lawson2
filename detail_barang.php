<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];
var_dump($_SESSION);

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

// ambil serial numbe barang
$serial_number = $_GET["serial_number"];

// query barang berdasarkan serial number
$result = query("SELECT * from aset where serial_number = '$serial_number'")[0];

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
    <div class="container pb-3">
        <div class="row">
            <div class="col">
                <h1>Detail Barang</h1>

                SN Barang : <?= $result["serial_number"]; ?> <br>
                No Tag : <?= $result["no_tag"]; ?> <br>
                Nama Barang : <?= $result["nama_barang"]; ?> <br>
                Jenis Barang : <?= $result["jenis_barang"]; ?> <br>
                Spesifikasi : <?= $result["spek"]; ?> <br>
                Kondisi : <?= $result["kondisi"]; ?> <br>
            </div>
        </div>
    </div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>