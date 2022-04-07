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

// pagination
$data_perhal = 10;
$jumlah_data = count(query("SELECT * from ((pengecekan inner join store on pengecekan.kd_store = store.KD_STORE)
inner join tipe on pengecekan.id_tipe = tipe.id_tipe) inner join ruangan on pengecekan.id_ruang = ruangan.id_ruang"));
$jumlah_hal = ceil($jumlah_data / $data_perhal);
$hal_aktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
$awal_data = ($data_perhal * $hal_aktif) - $data_perhal ;

$laporan = query("SELECT * from (((pengecekan inner join store on pengecekan.kd_store = store.KD_STORE) 
        inner join ruangan on pengecekan.id_ruang = ruangan.id_ruang)
        inner join tipe on pengecekan.id_tipe = tipe.id_tipe)
        inner join karyawan on pengecekan.nip = karyawan.nip order by tgl_cek desc, jam_cek desc");

$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];
// menyambungkan db table laporan dan table pengecekan

// search laporan
if (isset($_POST["cari"])) {
    $laporan = cari_laporan($_POST["keyword"]);
}

if (isset($_POST["tgl"])){
    // ambil data dari form
    $tgl_awal = $_POST["tgl_awal"];
    $tgl_akhir = $_POST["tgl_akhir"];

    if (empty($tgl_awal & $tgl_akhir))  {
        echo "<script> alert('Pilih Tanggal Terlebih dahulu'); 
                document.location.href= 'laporan.php'; </script>";

    } else if($_POST["tgl"] = 0) {
       echo "Data tidak ada";
    } else {
       $laporan = cari_tanggal($_POST["tgl"]);
    };
}

if(!$laporan){
    echo mysqli_error($koneksi);
}
if (isset($_POST["topdf"])) {
    topdf();
}
if (isset($_POST["topdf2"])) {
    topdf2();
}

if (isset($_POST["topdf3"])) {
    topdf3();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 pb-4">
            <h1 class="mt-4 d-print-none">Laporan Pengecekan</h1>
            <ol class="breadcrumb mb-4 d-print-none">
                <li class="breadcrumb-item"><a href="index.php"> Dashboard</a></li>
                <li class="breadcrumb-item active">Laporan Pengecekan</li>
            </ol>
        <div class="card mb-4">
            <div class="card-header d-print-none">
                <i class='fas fa-table me-1'></i>
                Laporan Hasil Pengecekan
            </div>
        <div class="card-body">
        <table cellspacing="5" cellpadding="5" class="d-print-none">
            <form action="" method="post">
                <tr>
                    <td width="60%">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control shadow-sm" name="keyword" placeholder="Masukkan Nama Aset">
                            <button type="submit" class="btn btn-outline-secondary" name="cari">Cari</button>
                        </div>
                    </td>
                <td align="right">
                <p>Cari berdasarkan tanggal</p>
                </td>
                <td width="15%">
                    <input type="date" name="tgl_awal" class="form-control  shadow-sm">
                    <input type="date" name="tgl_akhir" class="form-control  shadow-sm">
                    <button type="submit" class="input-group-text btn btn-outline-secondary" name="tgl">Cari</button>
                </td>
                </tr>
            </form>
            </table>

            <div class="row">
                <form action="" method="post">
                    <?php if (isset($_POST["tgl"])){
                        echo "<input type='date' name='tgl_awal' value='$_POST[tgl_awal]' hidden>
                            <input type='date' name='tgl_akhir' value='$_POST[tgl_akhir]' hidden>
                        <button type='submit' name='topdf2' class='btn btn-warning'> Print Laporan dari tanggal $_POST[tgl_awal] - $_POST[tgl_akhir]</button>";
                    } else if(isset($_POST["cari"])){
                        echo "<input type='text' name='nama' value='$_POST[keyword]'>
                        <button type='submit' name='topdf3' class='btn btn-warning'> Print Semua Data $_POST[keyword] </button>";
                    } else {
                        echo "<button type='submit' name='topdf' class='btn btn-warning'> Print Semua Data </button>";
                    }
                    ?>
                </form>
            </div> 

            <?php if (isset($_POST["cari"])) {
                $laporan = cari_laporan($_POST["keyword"]);
                $a = count($laporan);
                echo "<h4>Menampilkan ". $a. " Data </h4>";
            } else if (isset($_POST["tgl"])) {
                $laporan = cari_tanggal($_POST["tgl"]);
                $a = count($laporan);
                echo "<h4>Menampilkan ". $a. " Data </h4>";
            }
            ?>

            <table class="shadow sm table table-bordered border border-2 border-dark table-striped table-sm table-responsive" cellpadding="10" cellspacing="0" id='contoh'>
                <thead>
                    <th>No</th>
                    <th>Tanggal Pengecekan</th>
                    <th>Toko</th>
                    <th>Pengecek</th>
                    <th>Nama Aset</th>
                    <th>Spesifikasi</th>
                    <th>Kondisi</th>
                    <th>Kegiatan</th>
                    <th class="d-print-none">Detail</th>
                </thead>

                <tfoot>
                    <th>No</th>
                    <th>Tanggal Pengecekan</th>
                    <th>Toko</th>
                    <th>Pengecek</th>
                    <th>Nama Aset</th>
                    <th>Spesifikasi</th>
                    <th>Kondisi</th>
                    <th>Kegiatan</th>
                    <th class="d-print-none">Detail</th>
                </tfoot>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($laporan as $row) :?>
                    <tr>
                        <td class="align-middle text-center" width="50px"><?= $i ;?> </td>
                        <td class="align-middle"> <?= date("l, d F Y", strtotime($row["tgl_cek"])) . ' / ' . date("G:i", strtotime($row["jam_cek"])); ?></td>
                        <td class="align-middle"> <?= $row["NAMA_STORE"]; ?></td>
                        <td class="align-middle"> <?= $row["nama_lengkap"]; ?></td>
                        <td class="align-middle"> <?= $row["nama_aset"].' - '.$row["merk_aset"] ; ?></td>
                        <td class="align-middle"> <?= $row["spesifikasi"]; ?></td>
                        <td class="align-middle"> <?= $row["kondisi"]; ?></td>
                        <td class="align-middle"> <?= $row["kegiatan"]; ?></td>
                        <td class="align-middle text-center d-print-none"> <a href="detail_laporan_pengecekan.php?id_pengecekan=<?= $row["id_pengecekan"];?>"><i class="bi bi-eye-fill"></i></a> </td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="assets/js/datatables-simple-demo.js"></script>

</body>
</html>