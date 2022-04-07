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

$sn = query("SELECT * from histori inner join aset on histori.sn_lama = aset.serial_number where histori.sn_lama = aset.serial_number ");

$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];
// menyambungkan db table histori dan table histori
$histori = query("SELECT * from histori inner join karyawan on histori.nip = karyawan.nip order by tgl_histori desc, jam desc");

// search histori
if (isset($_POST["cari"])) {
    $histori = cari_histori($_POST["keyword"]);
}

if (isset($_POST["tgl"])){
    // ambil data dari form
    $tgl_awal = $_POST["tgl_awal"];
    $tgl_akhir = $_POST["tgl_akhir"];
    if (empty($tgl_awal & $tgl_akhir))  {
        echo "<script> alert('Pilih Tanggal Terlebih dahulu'); 
                document.location.href= 'histori.php'; </script>";

    } else if($_POST["tgl"] = 0) {
       echo "Data tidak ada";
    } else {
       $histori = cari_tanggal_mutasi($_POST["tgl"]); 
    };

}

if(!$histori){
    echo mysqli_error($koneksi);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Perubahan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<?php include 'templates/navbar.php';
      include 'templates/sidebar.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <h1 class="mt-4">Histori Mutasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Histori Mutasi</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header mb-2">
                    Laporan Mutasi
                </div>
    <table cellspacing="5" cellpadding="5" class="d-print-none mx-3" >
        <form action="" method="post">
            <tr>
                <td width="60%">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control  shadow-sm" name="keyword" placeholder="Masukkan Pengecek, Serial Number, atau No Tag yang ingin dicari">
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

        <div class="card-body">
            <table class="shadow-sm table table-bordered border border-2 border-dark table-striped table-sm table-responsive" cellpadding="10" cellspacing="0" id="datatablesSimple">
                <thead class="text-center align-middle">
                    <th rowspan="2" style="vertical-align: middle;">No</th>
                    <th rowspan="2" class="align-middle">Tanggal Mutasi</th>
                    <th rowspan="2">Pengecek</th>
                    <th colspan="2">Serial Number</th>
                    <th colspan="2">No Tag</th>
                    <th rowspan="2">Nama Aset</th>
                    <th rowspan="2">Keterangan Mutasi</th>
                    <th rowspan="2">Detail</th>
                </thead>
                <thead class="text-center">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>SN Lama</th>
                    <th>SN Baru</th>
                    <th>No Tag Lama</th>
                    <th>No Tag Baru</th>
                    <th></th>
                    <th></th>
                </thead>

                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($histori as $row) :?>
                    <tr>
                        <td class="align-middle text-center" width="50px"><?= $i ;?> </td>
                        <td class="align-middle"> <?= date("d-M-Y", strtotime($row["tgl_histori"])). ' / ' .  date("G:i", strtotime($row["jam"])) ; ?></td>
                        <td class="align-middle"> <?= $row["nama_lengkap"]; ?></td>
                        <td class="align-middle text-center"> <?= $row["sn_lama"]; ?></td>
                        <td class="align-middle bg-success text-center"> <?= $row["sn_baru"]; ?></td>
                        <td class="align-middle text-center"> <?= $row["no_tag_lama"];?></td>
                        <td class="align-middle bg-success text-center"> <?= $row["no_tag_baru"]; ?></td>
                        <td class="align-middle"> <?= $row["nama_aset"]; ?></td>
                        <td class="align-middle"> <?= $row["alasan"]; ?></td>
                        <td class="align-middle text-center"> <a href="detail_history.php?id_histori=<?= $row["id_histori"]; ?>"><i class="bi bi-eye-fill"></i></a></td>
                    </tr>
                <?php $i++; ?>
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