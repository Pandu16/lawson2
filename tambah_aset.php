<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];

require 'functions.php';

if (isset($_POST["submit"])) {
    if (tambah_aset($_POST) > 0) {
        echo " <script>
                alert('Aset Berhasil Ditambahkan!');
                document.location.href = 'aset.php';
                </script>
            ";
    } else{
        echo" <script>
            alert('Data gagal ditambahkan');
            document.location.href = 'aset.php';
        </script>";
    }
}

$tipe = query("SELECT * from tipe");
$ruangan = query("SELECT * from ruangan");
$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Tambah Aset</title>
    <script>
    $(function() {
        $("#KD_STORE").autocomplete({
            minLength: 2,
            source: "ajax/kode.php",
        });
    });
    </script>
</head>
<body class="sb-nav-fixed">
    <?php 
        include 'templates/navbar.php'; 
        include 'templates/sidebar.php';
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Aset</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Aset</li>
                </ol>
                <div class='card mb-4'>
                    <div class='card-header'>
                        <i class='fas fa-table me-1'></i>
                        Tambah Aset Baru
                    </div>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="nama_aset" class="form-label">Nama Aset</label>
                        <input type="text" class="form-control  shadow-sm" id="nama_aset" name="nama_aset" required>
                    </div>
                    <div class="row">
                    <div class="col mb-3">
                        <label for="id_tipe" class="form-label">Tipe Aset</label>
                        <select class="form-select shadow-sm" name="id_tipe" id="id_tipe" required>
                            <option hidden>Pilih Tipe</option>
                            <?php foreach ($tipe as $row) : ?>
                                <option value="<?= $row["id_tipe"];?>"><?= $row["nama_tipe"];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="merk_aset" class="form-label">Merk Aset</label>
                        <input type="text" class="form-control  shadow-sm" id="merk_aset" name="merk_aset" required>
                    </div>
                    <label for="" class="form-label">Harga</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp. </span>
                        <input type="text" class="form-control shadow-sm" placeholder="Masukkan Harga" name="harga" id="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="serial_number" class="form-label">SN Aset</label>
                        <input type="text" class="form-control  shadow-sm" id="serial_number" name="serial_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_tag" class="form-label">No Tag</label>
                        <input type="text" class="form-control  shadow-sm" id="no_tag" name="no_tag" required>
                    </div>
                    <div class="mb-3">
                        <label for="spesifikasi" class="form-label">Spesifikasi</label>
                        <textarea class="form-control  shadow-sm" id="spesifikasi" name="spesifikasi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select shadow-sm" name="kondisi" id="kondisi" required>
                            <option value="" hidden>Pilih Kondisi</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="KD_STORE" class="form-label">Kode Toko</label>
                            <input class="form-control  shadow-sm" type="text" name="KD_STORE" id="KD_STORE" onkeyup="isi_otomatis()" required>
                        </div>
                        <div class="mb-3 col">
                            <label for="id_ruang" class="form-label">Ruangan</label>
                            <select class="form-select shadow-sm" name="id_ruang" id="id_ruang" required>
                                <option hidden>Pilih Ruangan </option>
                                <?php foreach($ruangan as $row):?>
                                    <option value="<?= $row["id_ruang"];?>"><?= $row["nama_ruang"];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for="NAMA_STORE" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control  shadow-sm" id="NAMA_STORE" name="NAMA_STORE" disabled>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Tambah Aset!</button>
                    </div>
                </form>
        </div>
    </div>
</div>
</main>
</div>
</div>
<script type="text/javascript">
    function isi_otomatis(){
        var KD_STORE = $("#KD_STORE").val();
        $.ajax({
            url: 'ajax/nama_store.php',
            data: "KD_STORE="+KD_STORE,
        }).success(function (data){
            var json = data,
            obj = JSON.parse(json);
            $('#NAMA_STORE').val(obj.NAMA_STORE);
        });
    }
    (function () {
        $('#serial_number').keyup(function() {
            var empty = false;
            $('#nama_aset').each(function() {
                if ($(this).val() == '') {
                    empty = true;
                }
            });
    
            if (empty) {
                $('#kondisi').attr('disabled', 'disabled');
                $('#gambar').attr('disabled', 'disabled');
            } else {
                $('#kondisi').removeAttr('disabled');
                $('#gambar').removeAttr('disabled');
            }
        });
    })()
</script>
     
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="assets/js/datatables-simple-demo.js"></script>
</body>
</html>