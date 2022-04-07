<?php
require 'functions.php';

if (isset($_POST["submit"])) {
    if (tambah_lokasi($_POST) > 0) {
        echo " <script>
                alert('Lokasi Berhasil Ditambahkan!');
                document.location.href = 'lokasi_toko.php';
                </script>
            ";
    } else{
        echo "data gagal ditambahkan";
        echo" <script>
            alert('Data Gagal Ditambahkan');
        </script>";
        echo $koneksi->error;
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
    <title>Tambah Lokasi</title>
</head>
<body class="sb-nav-fixed">
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php';
?>
        <div class="col py-3 mx-4">
            <h1 align="center" class="mb-3"> Pengecekan Asset </h1> <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id_lokasi" class="form-label">ID Lokasi</label>
                        <input type="text" class="form-control  shadow-sm" id="id_lokasi" name="id_lokasi">
                    </div>
                    <div class="mb-3">
                        <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                        <input type="text" class="form-control  shadow-sm" id="nama_lokasi" name="nama_lokasi">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Tambah Lokasi</button>
                </form>
        </div>
    </div>
</div>
</div>
</div>
     
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>