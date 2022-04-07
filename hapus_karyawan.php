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

$nip = $_GET["nip"];

if (hapus_karyawan($nip) > 0 ) {
    echo "<script> alert('Data Berhasil Dihapus!');
          document.location.href = 'karyawan.php' </script>";
} else{
    echo "<script>alert('Data Gagal Dihapus!');</script>;";
    header("Location: karyawan.php");
}



?>