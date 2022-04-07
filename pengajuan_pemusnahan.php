<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// if($level != "support"){
//     header("Location: index.php");
// }
// konek db
require 'functions.php';


// ambil data
$ruangan = query("SELECT * from ruangan");

$store = query("SELECT * from store");
// ambil data pengecek
$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];


// ambil tanggal dan jam sekarang
$tgl = date("Y-m-d");
$jam = date("H:i:s");

// cek apakah tombol submit sudah ditekan
if(isset($_POST["submit"])){
    if(tambah_pemusnahan($_POST) > 0){
        echo"
        <script>
            alert(' Berhasil diajukan! ');
            document.location.href = 'pemusnahan.php';
        </script>

    ";
    } else {
        echo"
        <script>
            alert(' Gagal diajukan! ');
        </script>";  
        var_dump($_POST);
        echo mysqli_affected_rows($koneksi);
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
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Ajukan Pemusnahan Asset</title>
    <script>
    $(function() {
        $("#nama_aset").autocomplete({
            minLength: 2,
            source: "ajax/nama.php",
        });
        $("#merk_aset").autocomplete({
            minLength: 2,
            source: "ajax/merk.php",
        });
        $("#serial_number").autocomplete({
            minLength: 2,
            source: "ajax/sn.php",
        });
        $("#no_tag").autocomplete({
            minLength: 2,
            source: "ajax/tag.php",
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
            <h1 class="mt-4">Ajukan Pemusnahan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Ajukan Pemusnahan</li>
            </ol>
            <div class='card mb-4'>
                <div class='card-header'>
                    <i class='fas fa-table me-1'></i>
                    Ajukan Pemusnahan
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="tgl" value="<?= $tgl; ?>">
                <input type="hidden" name="jam" value="<?= $jam; ?>">
                <input type="hidden" name="nip" value="<?= $nip; ?>">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP Karyawan</label>
                        <input type="text" class="form-control  shadow-sm" id="nip" name="nip" value="<?= $karyawan["nip"];?>" required readonly>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control  shadow-sm" id="id_aset" name="id_aset" required hidden>
                    </div>
                    <div class="mb-3">
                        <label for="serial_number" class="form-label">Serial Number</label>
                        <input type="text" class="form-control  shadow-sm" id="serial_number" name="serial_number" onkeyup="isi_otomatis()" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_aset" class="form-label">Nama Aset</label>
                        <input type="text" class="form-control  shadow-sm" id="nama_aset" name="nama_aset" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="no_tag" class="form-label">No Tag</label>
                        <input type="text" class="form-control  shadow-sm" id="no_tag" name="no_tag" required readonly>
                    </div>
                    <div class="row">
                    <div class="col mb-3">
                        <label for="kd_store" class="form-label">Toko</label>
                        <select class="form-select shadow-sm" name="kd_store" id="kd_store" disabled>
                            <option selected hidden>Pilih store</option>
                            <?php foreach($store as $row) :?>
                            <option value="<?= $row["KD_STORE"];?>"><?= $row["NAMA_STORE"];?></option>
                            <?php endforeach;?>
                        </select>
                        <select class="form-select shadow-sm" name="KD_STORE" id="KD_STORE" hidden>
                        <?php foreach($store as $row) :?>
                            <option value="<?= $row["KD_STORE"];?>"><?= $row["NAMA_STORE"];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="id_ruang" class="form-label">Ruangan</label>
                        <select class="form-select shadow-sm" name="ID_RUANG" id="ID_RUANG" disabled>
                            <option selected hidden>Pilih Ruangan</option>
                            <?php foreach($ruangan as $row): ?>
                            <option value="<?= $row["id_ruang"];?>"><?= $row["nama_ruang"];?></option>
                            <?php endforeach;?>
                        </select>
                        <select class="form-select shadow-sm" name="id_ruang" id="id_ruang" hidden>
                        <?php foreach($ruangan as $row): ?>
                            <option value="<?= $row["id_ruang"];?>"><?= $row["nama_ruang"];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="spesifikasi" class="form-label">Spesifikasi</label>
                        <textarea class="form-control  shadow-sm" id="spesifikasi" name="spesifikasi" required readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select shadow-sm" name="kondisi" id="kondisi" required disabled="disabled">
                            <option selected value="" hidden>Pilih Kondisi</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Surat Jalan</label>
                        <input type="file" class="form-control  shadow-sm" id="gambar" name="gambar" required disabled="disabled">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
        </div>
    </div>
</div>
</main>
</div>
</div>
<script type="text/javascript">
    function isi_otomatis(){
        var serial_number = $("#serial_number").val();
        $.ajax({
            url: 'ajax/auto.php',
            data: "serial_number="+serial_number,
        }).success(function (data){
            var json = data,
            obj = JSON.parse(json);
            $('#nama_aset').val(obj.nama_aset);
            $('#no_tag').val(obj.no_tag);
            $('#id_ruang').val(obj.id_ruang);
            $('#ID_RUANG').val(obj.id_ruang);
            $('#KD_STORE').val(obj.KD_STORE);
            $('#kd_store').val(obj.KD_STORE);
            $('#spesifikasi').val(obj.spesifikasi);
            $('#id_aset').val(obj.id_aset);
        });
    }
</script>
     
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="assets/js/datatables-simple-demo.js"></script>

</body>
<script>
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
</html>