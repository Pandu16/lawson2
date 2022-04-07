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

// ambil data lokasi
$id_lokasi = $_GET["KD_STORE"];
$toko = query("SELECT * from store where KD_STORE = '$id_lokasi'")[0];

// ambil data 
$ruangan = query("SELECT * from ruangan");
$tipe = query("SELECT * from tipe");

// cek apakah Sudah memilih lokasi
if(!$id_lokasi){
    header("Location: ceklist.php");
}

// ambil data pengecek
$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];

// query data lokasi
$row = query("SELECT * from store where KD_STORE = '$id_lokasi'")[0]["KD_STORE"];

// ambil tanggal dan jam sekarang
$tgl_cek = date("Y-m-d");
$jam_cek = date("H:i:s");

// cek apakah tombol submit sudah ditekan
if(isset($_POST["submit"])){
    if(tambah($_POST) >= 0){
        echo"
        <script>
            alert(' Data Berhasil ditambahkan! ');
            document.location.href = 'ceklist.php';
        </script>
    ";
    } else {
        echo"
        <script>
                alert('Data Gagal Ditambahkan!');
            document.location.href = 'ceklist.php';
        </script>";  
        var_dump($_POST);        
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Pengecekan Asset</title>
    <script>
    
    $(function() {
        $("#nama_aset").autocomplete({
            minLength: 4,
            source: "ajax/nama.php",
        });
        $("#merk_aset").autocomplete({
            minLength: 4,
            source: "ajax/merk.php",
        });
        $("#serial_number").autocomplete({
            minLength: 4,
            source: "ajax/sn.php",
        });
        $("#no_tag").autocomplete({
            minLength: 4,
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
                <h1 class="mt-4">Pengecekan Aset</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pengecekan Aset</li>
                </ol>
                <div class='card mb-4'>
                    <div class='card-header'>
                        <i class='fas fa-table me-1'></i>
                        Cek Aset Toko <?= $toko["NAMA_STORE"]; ?>
                    </div>
                <div class="card-body">

                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="tgl_cek" value="<?= $tgl_cek; ?>">
                <input type="hidden" name="jam_cek" value="<?= $jam_cek; ?>">
                <div class="mb-3">
                        <label for="nip" class="form-label">NIP Karyawan</label>
                        <input type="text" class="form-control  shadow-sm" id="nip" name="nip" value="<?= $karyawan["nip"];?>" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="serial_number" class="form-label">Serial Number</label>
                        <input type="text" class="form-control  shadow-sm" id="serial_number" name="serial_number" onkeyup="isi_otomatis()" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_aset" class="form-label">Nama Aset</label>
                        <input type="text" class="form-control  shadow-sm" id="nama_aset" name="nama_aset" required disabled="disabled" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="id_tipe" class="form-label">Tipe Aset</label>
                        <select class="form-select shadow-sm" name="id_tipe" id="id_tipe" required disabled="disabled">
                            <option value="" selected hidden>Pilih Tipe Aset</option>
                            <?php foreach($tipe as $row) : ?>
                            <option value="<?= $row["id_tipe"];?>"><?= $row["nama_tipe"] ;?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="merk_aset" class="form-label">Merk Aset</label>
                        <input type="text" class="form-control  shadow-sm" id="merk_aset" name="merk_aset" required disabled="disabled">
                    </div>
                    <label for="" class="form-label">Harga</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp. </span>
                        <input type="text" class="form-control shadow-sm" placeholder="Masukkan Harga" name="harga" id="harga" required disabled="disabled">
                    </div>
                    <div class="mb-3">
                        <label for="no_tag" class="form-label">No Tag</label>
                        <input type="text" class="form-control  shadow-sm" id="no_tag" name="no_tag" required disabled="disabled">
                    </div>
                    <div class="mb-3">
                        <label for="id_ruang" class="form-label">Ruangan</label>
                        <select class="form-select shadow-sm" name="id_ruang" id="id_ruang" required disabled="disabled">
                            <option value="" selected hidden>Pilih Ruangan</option>
                            <?php foreach($ruangan as $row) : ?>
                            <option value="<?=$row["id_ruang"];?>"><?= $row["nama_ruang"];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="spesifikasi" class="form-label">Spesifikasi</label>
                        <textarea class="form-control  shadow-sm" id="spesifikasi" name="spesifikasi" required disabled="disabled"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select shadow-sm" name="kondisi" id="kondisi" required disabled="disabled">
                            <option value="" selected hidden>Pilih Kondisi</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">Kegiatan yang dilakukan</label>
                        <input type="text" class="form-control  shadow-sm" id="kegiatan" name="kegiatan" required disabled="disabled">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload bukti kegiatan</label>
                        <input type="file" class="form-control  shadow-sm" id="gambar" name="gambar" required disabled="disabled">
                    </div>
                    <input type="hidden" name="kd_store" value="<?= $id_lokasi;?>">
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
            url: 'ajax/autocek.php',
            data: "serial_number="+serial_number,
        }).success(function (data){
            var json = data,
            obj = JSON.parse(json);
            $('#nama_aset').val(obj.nama_aset);
            $('#id_tipe').val(obj.id_tipe);
            $('#merk_aset').val(obj.merk_aset);
            $('#no_tag').val(obj.no_tag);
            $('#id_ruang').val(obj.id_ruang);
            $('#spesifikasi').val(obj.spesifikasi);
            $('#harga').val(obj.harga);
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
                $('#nama_aset').attr('disabled', 'disabled');$
                $('#no_tag').attr('disabled', 'disabled');
                $('#id_ruang').attr('disabled', 'disabled');
                $('#id_tipe').attr('disabled', 'disabled');
                $('#merk_aset').attr('disabled', 'disabled');
                $('#spesifikasi').attr('disabled', 'disabled');
                $('#kegiatan').attr('disabled', 'disabled');
                $('#kondisi').attr('disabled', 'disabled');
                $('#gambar').attr('disabled', 'disabled');
                $('#harga').attr('disabled', 'disabled');
            } else {
                $('#nama_aset').removeAttr('disabled');$
                $('#no_tag').removeAttr('disabled');
                $('#id_ruang').removeAttr('disabled');
                $('#id_tipe').removeAttr('disabled');
                $('#merk_aset').removeAttr('disabled');
                $('#spesifikasi').removeAttr('disabled');
                $('#kegiatan').removeAttr('disabled');
                $('#kondisi').removeAttr('disabled');
                $('#gambar').removeAttr('disabled');
                $('#harga').removeAttr('disabled');
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