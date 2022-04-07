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
$query = $db->query("SELECT * FROM aset WHERE no_tag LIKE '%$searchTerm%' order by no_tag asc"); 
  
// Generate Array dengan data username
$usernameData = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id'] = $row['id_aset']; 
        $data['value'] = $row['no_tag'];
        array_push($usernameData, $data); 
    } 
} 
  
// Mengembalikan hasil sebagai array Json
echo json_encode($usernameData); 
?>