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

$id_aset = $_GET["id_aset"];
$id_musnah = $_GET["id_musnah"];
$nip =$_GET["nip"];
$serial_number = query("SELECT serial_number from aset where id_aset = '$id_aset'")[0];


if (musnah($id_musnah) > 0 ) {
    echo "<script> alert('Data Berhasil Dihapus!');
          document.location.href = 'aset.php';</script>";
} else{
    echo "<script>alert('Data Gagal Dihapus!');</script>;";
    header("Location: aset.php");
}



?>