<?php 
require '../functions.php';

// Get variable
$kd_store= $_GET['KD_STORE']; 
  
// Menampilkan Database
$query = mysqli_query($koneksi, "SELECT * FROM store WHERE KD_STORE = '$kd_store'"); 
$store = mysqli_fetch_array($query);
  
// Generate Array dengan data username
$data = array(
    'NAMA_STORE' => @$store['NAMA_STORE'],
); 

// Mengembalikan hasil sebagai array Json
echo json_encode($data); 
?>