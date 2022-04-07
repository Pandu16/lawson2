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

$id_pengecekan = $_GET["id_pengecekan"];

if (hapus_pengecekan($id_pengecekan) > 0 ) {
    echo "<script> alert('Data Berhasil Dihapus!');
          document.location.href = 'laporan.php' </script>";
} else{
    echo "<script>alert('Data Gagal Dihapus!');</script>;";
    header("Location: laporan.php");
}
?>