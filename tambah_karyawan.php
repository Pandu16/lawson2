<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];

require 'functions.php';

$karyawan = query("SELECT * from user inner join karyawan on user.nip = karyawan.nip where karyawan.nip = '$nip'")[0];

if (isset($_POST["submit"])) {
    if (tambah_karyawan($_POST) > 0) {
        echo " <script>
                alert('Karyawan Berhasil Ditambahkan!');
                document.location.href = 'karyawan.php';
                </script>
            ";
    } else{
        echo" <script>
            alert('Data gagal ditambahkan');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="assets/css/styles.css" rel="stylesheet" />
    <title>Tambah Karyawan</title>
</head>
<body class="sb-nav-fixed">
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php';
?>
<div id="layoutSidenav_content">
        <div class="col py-3 mx-4">
            <h1 class="mb-3 text-center"> Tambah Karyawan </h1> <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option selected hidden value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Tambah Karyawan</button> 
                </form>
        </div>
        </div>
    </div>
</div>
</div>
</div>
     
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>