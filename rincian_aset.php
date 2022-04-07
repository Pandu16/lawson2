<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// panggil file functions
require 'functions.php';

$kd_store = $_GET["kd_store"];
$id_tipe = $_GET["id_tipe"];
var_dump($kd_store);
var_dump($id_tipe);

$aset = query("SELECT * from (aset inner join store on aset.kd_store = store.KD_STORE) 
        inner join tipe on aset.id_tipe = tipe.id_tipe where aset.kd_store= '$kd_store' and aset.id_tipe= '$id_tipe'");
var_dump($aset);
$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];



if (!$aset) {
    echo mysqli_error($koneksi);
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
    <title>Assets</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
    $(function() {
        $("#aset").autocomplete({
            minLength: 2,
            source: "ajax/toko.php",
        });
    });
    </script>
</head>
<body class="sb-nav-fixed">
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php';
?>
    <div class="col">
        
        <h1>Data Aset</h1>
        <button class="btn btn-primary mb-3 d-print-none"> <a class="text-decoration-none text-light" href="tambah_aset.php"> Tambah Aset Baru </a></button>
        <form action="" method="post">
            <div class="input-group mb-3 d-print-none">
                <input type="text" class="form-control  shadow-sm" name="keyword" id="aset" placeholder="Masukkan SN, Tag, Nama atau Tipe Aset" minlength="4">
                <button type="submit" class="btn btn-outline-secondary" name="cari">Cari</button>
            </div>
        </form>
        <?php if (isset($_POST["cari"])) {
            $aset = cari_aset2($_POST["keyword"]);
            $a = count($aset);
            $keyword = $_POST["keyword"];
            echo "<h4>Menampilkan ". $a. " Hasil ". "<b>$keyword</b>". "</h4>";} 
        ?>

        <table class="shadow sm table border border-dark table-fixed table-sm table-bordered table-striped">
            <thead class="text-center align-middle">
                <th>No</th>
                <th>Kode Toko</th>
                <th>Nama Toko</th>
                <th>Tipe Aset </th>
                <th>Qty</th>
                <th>Harga</th>
                <?php if(isset($_POST["cari"])){
                 echo "<th>Detail</th>";
                }?>
            </thead>

            <tbody>
                <form action="">
                <?php $i = 1; ?>
                <?php foreach($aset as $row):?>
                <tr>
                    <input type="text" name="id_tipe" class="tipe" value="<?= $row["id_tipe"] ;?>">
                    <td class="align-middle text-center"><?= $i ;?></td>
                    <td class="align-middle"><?= $row["kd_store"];?></td>
                    <td class="align-middle"><?= $row["NAMA_STORE"];?></td>
                    <td class="align-middle" ><?= $row["nama_tipe"];?></td>
                    <td class="align-middle">Rp. <?= number_format($row["harga"],0,',','.');?></td> <a href=""></a>
                    <?php if (isset($_POST["cari"])) {
                        echo "<td class='align-middle'><button type='button' class='view_data btn btn-primary' name='KD_STORE' data-bs-toggle='modal' data-bs-target='#a' id='$row[kd_store]'> Ringkasan </button></td>
                        <td class='align-middle'><button type='button' class='btn btn-success' name='submit' id='submit'>  Detail </button></td>";
                    }?>
                    
                </tr>
                <?php $i++ ;?>
                <?php endforeach;?>
                <?php if (isset($_POST["cari"])) {
                    $p = query("SELECT sum(harga) a, count(*) c from (aset inner join tipe on aset.id_tipe = tipe.id_tipe) inner join store on aset.kd_store = store.KD_STORE where serial_number like '%$keyword%' or
                    no_tag like '%$keyword%' or
                    nama_aset like '%$keyword%' or
                    merk_aset like '%$keyword%' or
                    aset.id_tipe like '%$keyword%' or
                    nama_tipe like '%$keyword%' or
                    spesifikasi like '%$keyword%' or
                    aset.kd_store like '%$keyword%' or
                    NAMA_STORE like '%$keyword%'")[0];
                    echo "<tr>
                            <td colspan='4'><b> Total </b></td>
                            <td class='text-center'><b>$p[c]</b> </td>
                            <td><b>Rp. ".number_format($p['a'],0,',','.'). "</b></td>
                        </tr>";}
                ?>
            </tbody>
            </form>
        </table>
    </div>

    <div class="modal fade" id="a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Data Aset</h4>
                    <button type="button" class="btn btn-default btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="data_aset">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<script>
$(document).ready(function(){
    $('.view_data').click(function(){
        var KD_STORE = $(this).attr("id");
        var id_tipe = $('.tipe').attr("value");
        $.ajax({
            url: 'ajax/rekap/aset.php',
            method: 'post',
            data: {KD_STORE:KD_STORE, id_tipe:id_tipe},
            success:function(data){
                $('#data_aset').html(data);
                $('#a').modal("show");
            }
        });
    });
});
</script>


<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>