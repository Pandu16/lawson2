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
        die;
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
    <title>Tambah Toko</title>
</head>
<body class="sb-nav-fixed">
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php';
?>
        <div class="col py-3 mx-4">
            <h1 align="center" class="mb-3"> Tambah Toko </h1> <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="KD_STORE" class="form-label">Kode Store</label>
                        <input type="text" class="form-control  shadow-sm" id="KD_STORE" name="KD_STORE">
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="KD_REGION" class="form-label">Kode Region</label>
                            <input type="text" class="form-control  shadow-sm" id="KD_REGION" name="KD_REGION">
                        </div>
                        <div class="col mb-3">
                            <label for="KD_BRANCH" class="form-label">Kode Cabang</label>
                            <input type="text" class="form-control  shadow-sm" id="KD_BRANCH" name="KD_BRANCH">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="NAMA_STORE" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control  shadow-sm" id="NAMA_STORE" name="NAMA_STORE">
                    </div>
                    <div class="mb-3">
                        <label for="ALIAS" class="form-label">Alias</label>
                        <input type="text" class="form-control  shadow-sm" id="ALIAS" name="ALIAS">
                    </div>
                    <div class="mb-3">
                        <label for="ALAMAT1" class="form-label">Alamat</label>
                        <input type="text" class="form-control  shadow-sm" id="ALAMAT1" name="ALAMAT1">
                    </div>
                    <div class="mb-3">
                        <label for="ALAMAT2" class="form-label">Kel - Kec</label>
                        <input type="text" class="form-control  shadow-sm" id="ALAMAT2" name="ALAMAT2">
                    </div>
                    <div class="mb-3">
                        <label for="ALAMAT3" class="form-label">Kota</label>
                        <input type="text" class="form-control  shadow-sm" id="ALAMAT3" name="ALAMAT3">
                    </div>
                    <div class="mb-3">
                        <label for="KODE_POS" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control  shadow-sm" id="KODE_POS" name="KODE_POS">
                    </div>
                    <div class="mb-3">
                        <label for="TELP" class="form-label">No Telepon</label>
                        <input type="text" class="form-control  shadow-sm" id="TELP" name="TELP">
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