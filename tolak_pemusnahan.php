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
$serial_number = query("SELECT serial_number from aset where id_aset = '$id_aset'")[0];


if (tolak($id_musnah) > 0 ) {
    send_email();
    echo "<script> alert('Pengajuan ditolak! \\nAset tidak dimusnahkan');
          document.location.href = 'pemusnahan.php' </script>";
} else{
    echo "<script>alert('Error!');</script>;";
    header("Location: aset.php");
}



?>