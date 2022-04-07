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

$id_lokasi = $_GET["id_lokasi"];

$lokasi = query("SELECT * from lokasi where id_lokasi = $id_lokasi")[0];

if (isset($_POST["edit"])) {
    if (edit_lokasi($_POST) > 0) {
        echo " <script>
                alert('Lokasi Berhasil Ditambahkan!');
                document.location.href = 'lokasi_toko.php';
                </script>
            ";
    } else{
        echo" <script>
            alert('Data gagal diubah karena tidak ada perubahan');
            document.location.href = 'lokasi_toko.php';
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
    <title>Tambah Lokasi</title>
</head>
<body class="sb-nav-fixed">
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php';
?>
        <div class="col py-3 mx-4">
            <h1 align="center" class="mb-3"> Update Lokasi </h1> <hr>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="id_lokasi" class="form-label">ID Lokasi</label>
                        <input type="number" class="form-control" id="id_lokasi" name="id_lokasi" value="<?= $lokasi["id_lokasi"]; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                        <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" value="<?= $lokasi["nama_lokasi"];?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="edit">Edit Lokasi </button>
                </form>
            </div>
        </div>
    </div>
<!-- Tutup div dari sidebar.php -->
</div>
</div>
     
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>