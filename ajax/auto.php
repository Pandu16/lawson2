<?php 
require '../functions.php';

// Get variable
$serial_number= $_GET['serial_number']; 

// Menampilkan Database
$query = mysqli_query($koneksi, "SELECT * FROM aset WHERE serial_number = '$serial_number'"); 
$aset = mysqli_fetch_array($query);
  
// Generate Array dengan data username
$data = array(
    'nama_aset' => @$aset['nama_aset'],
    'no_tag' => @$aset['no_tag'],
    'spesifikasi' => @$aset['spesifikasi'],
    'kd_store' => @$aset['kd_store'],
    'KD_STORE' => @$aset['kd_store'],
    'id_ruang' => @$aset['id_ruang'],
    'ID_RUANG' => @$aset['id_ruang'],
    'id_aset' => @$aset['id_aset'],
); 

// Mengembalikan hasil sebagai array Json
echo json_encode($data); 
?>