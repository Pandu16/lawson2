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

// pagination
$data_perhal = 5;
$jumlah_data = count(query("SELECT * from pemusnahan"));
$jumlah_hal = ceil($jumlah_data / $data_perhal);
$hal_aktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
$awal_data = ($data_perhal * $hal_aktif) - $data_perhal ;

$pemusnahan = query("SELECT * from ((pemusnahan inner join store on pemusnahan.kd_store = store.KD_STORE) 
        inner join ruangan on pemusnahan.id_ruang = ruangan.id_ruang) inner join karyawan on pemusnahan.nip = karyawan.nip limit $awal_data, $data_perhal");

$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];

if (isset($_POST["cari"])) {
    $pemusnahan = cari_pemusnahan($_POST["keyword"]);
}

if (!$pemusnahan) {
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
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Pemusnahan Aset</title>
</head>
<body class="sb-nav-fixed">
<?php 
    include 'templates/navbar.php'; 
    include 'templates/sidebar.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 pb-4">
            <h1 class="mt-4 d-print-none">Pemusnahan</h1>
            <ol class="breadcrumb mb-4 d-print-none">
                <li class="breadcrumb-item"><a href="index.php"> Dashboard</a></li>
                <li class="breadcrumb-item active">Pemusnahan</li>
            </ol>
        <div class="card mb-4">
            <div class="card-header d-print-none">
                <i class='fas fa-table me-1'></i>
                Data Aset
            </div>
        <div class="card-body">
        <table cellspacing="5" cellpadding="5" class="d-print-none">
        <form action="" method="post">
            <tr>
                <td width="60%">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control  shadow-sm" name="keyword" placeholder="Masukkan no tag, nama aset, atau kegiatan yang ingin dicari">
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

        <?php if (isset($_POST["cari"])) {
            $pemusnahan = cari_pemusnahan($_POST["keyword"]);
            $a = count($pemusnahan);
            echo "<h4>Menampilkan ". $a. " Data </h4>";
        } else if (isset($_POST["tgl"])) {
            $pemusnahan = cari_tanggal_musnah($_POST["tgl"]);
            $a = count($pemusnahan);
            echo "<h4>Menampilkan ". $a. " Data </h4>";
        }
        ?>
        <!-- Pagination -->
        <?php if ((!isset($_POST["cari"]) && !isset($_POST["tgl"]))) : ?>
            <?php if($hal_aktif > 1) :?>
                <a class="text-light d-print-none"  href="?hal=<?= $hal_aktif - 1 ;?>"><button class="btn btn-primary mb-3"> &laquo; </button></a>
            <?php endif; ?>

            <?php for($i = 1; $i <= $jumlah_hal; $i++) :?>
                <?php if($i == $hal_aktif)  :?>
                    <a class="text-decoration-none text-light d-print-none" href="?hal=<?= $i ;?>"> <button class="mb-3 btn btn-secondary disabled"><?= $i ;?>  </button></a>
                <?php else :?>
                    <a class="text-decoration-none text-light d-print-none" href="?hal=<?= $i ;?>"> <button class="mb-3 btn btn-primary"><?= $i ;?>  </button></a>
                <?php endif ; ?>
            <?php endfor ;?>

            <?php if($hal_aktif < $jumlah_hal) :?>
                <a class="text-light d-print-none" href="?hal=<?= $hal_aktif + 1 ;?>"><button class="mb-3 btn btn-primary"> &raquo; </button></a>
            <?php endif; ?>

        <?php endif; ?>

        <table class="shadow sm table border border-dark table-fixed table-sm table-bordered table-striped"  id="datatablesSimple">
            <thead class="text-center">
                <th>No</th>
                <th>Pengaju</th>
                <th>SN</th>
                <th>No Tag</th>
                <th>Nama Aset</th>
                <th>Toko</th>
                <th>Ruangan</th>
                <th>Spesifikasi</th>
                <th>Kondisi</th>
                <th>Surat Jalan</th>
                <th class="d-print-none">Action</th>
            </thead>

            <tbody>
                <?php $i = 1; ?>
                <?php foreach($pemusnahan as $row):?>
                <tr>
                    <td class="align-middle text-center"><?= $i ;?></td>
                    <td class="align-middle"><?= $row["nama_lengkap"];?></td>
                    <td class="align-middle"><?= $row["serial_number"];?></td>
                    <td class="align-middle"><?= $row["no_tag"];?></td>
                    <td class="align-middle"><?= $row["nama_aset"];?></td>
                    <td class="align-middle"><?= $row["NAMA_STORE"];?></td>
                    <td class="align-middle"><?= $row["nama_ruang"];?></td>
                    <td width="200px" class="align-middle"><?= $row["spesifikasi"];?></td>
                    <td class="align-middle"><?= $row["kondisi"];?></td>
                    <td class="align-middle text-center"> <a target="_blank" href="img/<?= $row["surat_jalan"];?>"><img width="100px" src="img/<?= $row["surat_jalan"];?>"></a></td>
                    <td class="align-middle d-print-none text-center">
                    <button class="btn btn-sm btn-danger"><a class="text-decoration-none text-dark" href="tolak_pemusnahan.php?id_musnah=<?= $row["id_musnah"]. '&id_aset='. $row["id_aset"]. '&surat_jalan=' .$row["surat_jalan"]. '&nip=' .$row["nip"]. '&email=' .$row["email"]  ;?>" onclick="return confirm('Tolak Pengajuan?')"><i class="bi bi-x-lg"></i></a></button> | 
                    <button class="btn btn-sm btn-primary"><a class="text-decoration-none text-dark" href="musnah_aset.php?id_musnah=<?= $row["id_musnah"]. '&id_aset='. $row["id_aset"]. '&surat_jalan=' .$row["surat_jalan"]. '&nip=' .$row["nip"]. '&email=' .$row["email"]  ;?>" onclick="return confirm('Terima Pengajuan? (Data Aset akan dihapus)')"><i class="bi bi-check-lg"></i></a></button>
                    </td>
                </tr>
                <?php $i++ ;?>
                <?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</main>
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