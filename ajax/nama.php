<?php 
// Konfigurasi Database 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "lawson"; 
  
// Membuat Koneksi Database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
  
// Cek Koneksi
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
} 
  
// Get Search Term
$searchTerm = $_GET['term']; 
  
// Menampilkan Database
$query = $db->query("SELECT * FROM store WHERE NAMA_STORE LIKE '%$searchTerm%' or
KD_STORE LIKE '%$searchTerm%' or 
ALAMAT1 LIKE '%$searchTerm%' or
ALAMAT2 LIKE '%$searchTerm%' or
ALAMAT3 LIKE '%$searchTerm%' 
order by nama_aset asc"); 
  
// Generate Array dengan data username
$usernameData = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id'] = $row['id_aset']; 
        $data['value'] = $row['NAMA_STORE'];
        array_push($usernameData, $data); 
    } 
} 
  
// Mengembalikan hasil sebagai array Json
echo json_encode($usernameData); 
?>