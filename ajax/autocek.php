<?php 
require '../functions.php';

// Get variable
$serial_number= $_GET["serial_number"]; 

// Menampilkan Database 
$query = mysqli_query($koneksi, "SELECT * FROM aset WHERE serial_number = '$serial_number'");
$aset = mysqli_fetch_array($query);
  
// Generate Array dengan data username
$data = array(
    'nama_aset' => @$aset['nama_aset'],
    'id_tipe' => @$aset['id_tipe'],
    'merk_aset' => @$aset['merk_aset'],
    'no_tag' => @$aset['no_tag'],
    'id_ruang' => @$aset['id_ruang'],
    'spesifikasi' => @$aset['spesifikasi'],
    'harga' => @$aset['harga'],
); 

// Mengembalikan hasil sebagai array Json
echo json_encode($data); 
?>