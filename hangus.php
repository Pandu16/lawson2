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

$serial_number = $_GET["serial_number"];

if (hapus_aset($serial_number) > 0 ) {
    echo "<script>confirm('Apakah anda yakin?');
          alert('Data Berhasil Dihapus!');</script>";
    var_dump($serial_number);
    die;
    header("Location: history.php");
} else{
    echo "<script>alert('Data Gagal Dihapus!');</script>;";
    header("Location: history.php");
}



?>