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

$kd_store = $_GET["KD_STORE"];

if (hapus_toko($kd_store) > 0 ) {
    echo "<script>alert('Data Berhasil Dihapus!');
          document.location.href = 'lokasi_toko.php';      
    </script>";
} else{
    echo "<script>alert('Data Gagal Dihapus!');
          
          </script>";
          var_dump($kd_store);
          die;
}



?>