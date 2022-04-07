<?php
session_start();
$level = $_SESSION["level"];
$nip = $_SESSION["nip"];
$surel = $_SESSION["email"];

require 'functions.php';

// pagination
$data_perhal = 10;
$jumlah_data = count(query("SELECT * from store"));
$jumlah_hal = ceil($jumlah_data / $data_perhal);
$hal_aktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
$awal_data = ($data_perhal * $hal_aktif) - $data_perhal;

// query
    $lokasi = query("SELECT * from store limit $awal_data, $data_perhal");
    $store = count(query("SELECT * from store"));
    $ringkasan = mysqli_query($koneksi, "SELECT store.KD_STORE, NAMA_STORE, sum(harga) a, count(*) c from aset inner join store on aset.kd_store = store.KD_STORE group by store.KD_STORE");
    $ringkas = mysqli_query($koneksi, "SELECT KD_STORE, ALAMAT3, NAMA_STORE from store");
    $aset = mysqli_query($koneksi, "SELECT id_tipe, nama_tipe, count(*) from aset inner join store on store.KD_STORE = aset.kd_store group by store.KD_STORE");
    $printer = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 3 group by store.KD_STORE");
    $printer2 = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 3")[0];
    $komputer = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 1 group by store.KD_STORE");
    $komputer2 = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 1")[0];
    $monitor = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 2 group by store.KD_STORE");
    $monitor2 = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 2")[0];
    $proyektor = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 4 group by store.KD_STORE");
    $proyektor2 = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 4")[0];
    $router = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 5 group by store.KD_STORE");
    $router2 = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE where id_tipe = 5")[0];
    $total = query("SELECT * from aset");
    $total2 = query("SELECT nama_aset, store.KD_STORE, NAMA_STORE, sum(harga) c, count(*) a from aset inner join store on aset.kd_store = store.KD_STORE")[0];
    $karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];
// search lokasi
if (isset($_POST["cari"])) {
    $lokasi = cari($_POST["keyword"]);
}

if (!$lokasi) {
    echo mysqli_error($koneksi);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Aset</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.boostrapcdn.com/3.3.6/css/boostrap.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdeliver.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'templates/navbar.php'; 
          include 'templates/sidebar.php'
    ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Rekap Aset</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php"> Dashboard </a></li>
                <li class="breadcrumb-item active">Rekap Aset</li>
            </ol>
            <form action="" method="POST">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="card bg-primary text-white mb-4">
                        <button class="btn btn-sm btn-primary" name="komputer">
                        <div class="card-body">Komputer 
                            <div class="text-white fs-2 text-center"> <?= count($komputer);?> </i></div>
                        </div>
                        <div class="card-footer align-items-center justify-content-between">
                        <div class="text-white fs-4 text-center"> Rp. <?= number_format($komputer2["c"],0,',','.')  ;?></i></div>
                        </div>
                    </button>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="card bg-warning text-white mb-4">
                        <button class="btn btn-sm btn-warning text-white" name="monitor">
                            <div class="card-body">Monitor
                                <div class="text-white fs-2 text-center"> <?= count($monitor);?> </i></div>
                            </div>
                            <div class="card-footer align-items-center justify-content-between">
                                <div class="text-white fs-4 text-center"> Rp. <?= number_format($monitor2["c"],0,',','.')  ;?></i></div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="card bg-success text-white mb-4">
                        <button class="btn btn-sm btn-success" name="printer">
                            <div class="card-body">Printer
                                <div class="text-white fs-2 text-center"> <?= count($printer);?> </i></div>
                            </div>
                            <div class="card-footer align-items-center justify-content-between">
                            <div class="text-white fs-4 text-center"> Rp. <?= number_format($printer2["c"],0,',','.')  ;?></i></div>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
            <form action="" method="post">
            <div class="row mb-3">
                <div class="col-xl-4 col-md-4">
                    <div class="card bg-danger text-white mb-4">
                        <button class="btn btn-sm btn-danger" name="proyektor">
                            <div class="card-body">Proyektor
                                <div class="text-white fs-2 text-center"> <?= count($proyektor);?> </i></div>
                            </div>
                            <div class="card-footer align-items-center justify-content-between">
                                <div class="text-white fs-4 text-center"> Rp. <?= number_format($proyektor2["c"],0,',','.')  ;?></i></div>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                        <div class="card bg-danger text-white mb-4">
                            <button class="btn btn-sm btn-danger" name="router">
                                <div class="card-body">Router
                                    <div class="text-white fs-2 text-center"> <?= count($router);?> </i></div>
                                </div>
                                <div class="card-footer align-items-center justify-content-between">
                                    <div class="text-white fs-4 text-center"> Rp. <?= number_format($router2["c"],0,',','.')  ;?></i></div>
                                </div>
                            </button>
                        </div>
                    </div>

                <div class="col-xl-4 col-md-4">
                    <div class="card bg-danger text-white mb-4">
                        <button class="btn btn-sm btn-danger" name="total">
                            <div class="card-body">Total Aset
                                <div class="text-white fs-2 text-center"> <?= count($total);?> </i></div>
                            </div>
                            <div class="card-footer align-items-center justify-content-between">
                                <div class="text-white fs-4 text-center"> Rp. <?= number_format($total2["c"],0,',','.')  ;?></i></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

    </form>
    <?php 
        // Tampil Total Aset 
        if (isset($_POST["total"])){
            echo "<h1> Jumlah Aset di Setiap Toko</h1>
            <hr>
            <div class='row'>";
            $i = 1;              
            $num_item = ceil($store / 3) ;
            $current_col = 0;
            $v = '';
                foreach ($ringkasan as $row) {
                    if ($current_col == 0 ) {
                        $v .= "<div class='col-sm-4'> 
                                <form action='' method='get'> 
                                    <table class='table table-bordered border-dark table-striped' cellpadding='10' cellspacing='0'>
                                        <thead align='center'>
                                            <th class='text-center' width='5px' >No</th>
                                            <th width='70%'>Nama Toko</th>
                                            <th width='10%'>Jumlah Aset</th>
                                            <th width='10%'>Subtotal Aset</th>
                                        </thead>"
                                ;
                    }
                        $v .= "<tr>
                                    <td class='text-center'>".$i."</td> 
                                    <td>".$row["NAMA_STORE"]."</td> 
                                    <td class='text-center'> <button type='button' class='view_data btn btn-primary'  name='KD_STORE' data-bs-toggle='modal' data-bs-target='#a' id='$row[KD_STORE]'> $row[c] </button></td>
                                    <td> Rp. ".number_format($row["a"],0,",",".")."</td> 
                                </a></tr>";
                        if($current_col == $num_item -1) {
                        $current_col = 0;
                        $i += 1;
                        $v .= "</table></form></div>";
                    } else {
                        $current_col++;
                        $i++;
                    }
                }
                $v .= "</table></form></div>";

                echo $v;
                } 
        // Tampil Printer
        else if (isset($_POST["printer"])){
            echo "<h1> Jumlah Printer di Setiap Toko</h1>
            <hr>
            <div class='row'>";
            $i = 1;              
            $num_item = ceil(count($printer) / 3 ) ;
            $current_col = 0;
            $v = '';
                foreach ($printer as $row) {
                    if ($current_col == 0 ) {
                        $v .= "<div class='col-sm-4'> 
                                <form action='' method='get'> 
                                    <table class='table table-bordered border-dark table-striped' cellpadding='10' cellspacing='0'>
                                        <thead align='center'>
                                            <th class='text-center' width='5px' >No</th>
                                            <th width='70%'>Nama Toko</th>
                                            <th width='10%'>Jumlah Printer</th>
                                        </thead>"
                                ;
                    }
                        $v .= "<tr>
                                    <td class='text-center'>".$i."</td> 
                                    <td>".$row["NAMA_STORE"]."</td> 
                                    <td class='text-center'> <button type='button' class='view_printer btn btn-primary'  name='KD_STORE' data-bs-toggle='modal' data-bs-target='#a' id='$row[KD_STORE]'> $row[a] </button></td>
                                </a></tr>";
                        if($current_col == $num_item -1) {
                        $current_col = 0;
                        $i += 1;
                        $v .= "</table></form></div>";
                    } else {
                        $current_col++;
                        $i++;
                    }
                }
                $v .= "</table></form></div>";
    
                echo $v;
                }
                
        // Tampil Monitor
        else if (isset($_POST["monitor"])){
            echo "<h1> Jumlah Monitor di Setiap Toko</h1>
            <hr>
            <div class='row'>";
            $i = 1;              
            $num_item = ceil(count($monitor) / 3 ) ;
            $current_col = 0;
            $v = '';
                foreach ($monitor as $row) {
                    if ($current_col == 0 ) {
                        $v .= "<div class='col-sm-4'> 
                                <form action='' method='get'> 
                                    <table class='table table-bordered border-dark table-striped' cellpadding='10' cellspacing='0'>
                                        <thead align='center'>
                                            <th class='text-center' width='5px' >No</th>
                                            <th width='70%'>Nama Toko</th>
                                            <th width='10%'>Jumlah Monitor</th>
                                        </thead>"
                                ;
                    }
                        $v .= "<tr>
                                    <td class='text-center'>".$i."</td> 
                                    <td>".$row["NAMA_STORE"]."</td> 
                                    <td class='text-center'> <button type='button' class='view_monitor btn btn-primary'  name='KD_STORE' data-bs-toggle='modal' data-bs-target='#a' id='$row[KD_STORE]'> $row[a] </button></td>
                                </a></tr>";
                        if($current_col == $num_item -1) {
                        $current_col = 0;
                        $i += 1;
                        $v .= "</table></form></div>";
                    } else {
                        $current_col++;
                        $i++;
                    }
                }
                $v .= "</table></form></div>";
    
                echo $v;
                }

        // Tampil Komputer
        else if (isset($_POST["komputer"])){
            echo "<h1> Jumlah Komputer di Setiap Toko</h1>
            <hr>
            <div class='row'>";
            $i = 1;              
            $num_item = ceil(count($komputer) / 3 ) ;
            $current_col = 0;
            $v = '';
                foreach ($komputer as $row) {
                    if ($current_col == 0 ) {
                        $v .= "<div class='col-sm-4'> 
                                <form action='' method='get'> 
                                    <table class='table table-bordered border-dark table-striped' cellpadding='10' cellspacing='0'>
                                        <thead align='center'>
                                            <th class='text-center' width='5px' >No</th>
                                            <th width='70%'>Nama Toko</th>
                                            <th width='10%'>Jumlah Komputer</th>
                                        </thead>"
                                ;
                    }
                        $v .= "<tr>
                                    <td class='text-center'>".$i."</td> 
                                    <td>".$row["NAMA_STORE"]."</td> 
                                    <td class='text-center'> <button type='button' class='view_komputer btn btn-primary'  name='KD_STORE' data-bs-toggle='modal' data-bs-target='#a' id='$row[KD_STORE]'> $row[a] </button></td>
                                </a></tr>";
                        if($current_col == $num_item -1) {
                        $current_col = 0;
                        $i += 1;
                        $v .= "</table></form></div>";
                    } else {
                        $current_col++;
                        $i++;
                    }
                }
                $v .= "</table></form></div>";
    
                echo $v;
                }
        // Tampil proyektor
        else if (isset($_POST["proyektor"])){
            echo "<h1> Jumlah Proyektor di Setiap Toko</h1>
            <hr>
            <div class='row'>";
            $i = 1;              
            $num_item = ceil(count($proyektor) / 3 ) ;
            $current_col = 0;
            $v = '';
                foreach ($proyektor as $row) {
                    if ($current_col == 0 ) {
                        $v .= "<div class='col-sm-4'> 
                                <form action='' method='get'> 
                                    <table class='table table-bordered border-dark table-striped' cellpadding='10' cellspacing='0'>
                                        <thead align='center'>
                                            <th class='text-center' width='5px' >No</th>
                                            <th width='70%'>Nama Toko</th>
                                            <th width='10%'>Jumlah Proyektor</th>
                                        </thead>"
                                ;
                    }
                        $v .= "<tr>
                                    <td class='text-center'>".$i."</td> 
                                    <td>".$row["NAMA_STORE"]."</td> 
                                    <td class='text-center'> <button type='button' class='view_proyektor btn btn-primary'  name='KD_STORE' data-bs-toggle='modal' data-bs-target='#a' id='$row[KD_STORE]'> $row[a] </button></td>
                                </a></tr>";
                        if($current_col == $num_item -1) {
                        $current_col = 0;
                        $i += 1;
                        $v .= "</table></form></div>";
                    } else {
                        $current_col++;
                        $i++;
                    }
                }
                $v .= "</table></form></div>";
    
                echo $v;
                }
        // Tampil Router
        else if (isset($_POST["router"])){
            echo "<h1> Jumlah Router di Setiap Toko</h1>
            <hr>
            <div class='row'>";
            $i = 1;              
            $num_item = ceil(count($router) / 3 ) ;
            $current_col = 0;
            $v = '';
                foreach ($router as $row) {
                    if ($current_col == 0 ) {
                        $v .= "<div class='col-sm-4'> 
                                <form action='' method='get'> 
                                    <table class='table table-bordered border-dark table-striped' cellpadding='10' cellspacing='0'>
                                        <thead align='center'>
                                            <th class='text-center' width='5px' >No</th>
                                            <th width='70%'>Nama Toko</th>
                                            <th width='10%'>Jumlah Router</th>
                                        </thead>"
                                ;
                    }
                        $v .= "<tr>
                                    <td class='text-center'>".$i."</td> 
                                    <td>".$row["NAMA_STORE"]."</td> 
                                    <td class='text-center'> <button type='button' class='view_router btn btn-primary'  name='KD_STORE' data-bs-toggle='modal' data-bs-target='#a' id='$row[KD_STORE]'> $row[a] </button></td>
                                </a></tr>";
                        if($current_col == $num_item -1) {
                        $current_col = 0;
                        $i += 1;
                        $v .= "</table></form></div>";
                    } else {
                        $current_col++;
                        $i++;
                    }
                }
                $v .= "</table></form></div>";
    
                echo $v;
                }
                ?>

        <!-- Modal Tampil -->
        <div class="modal fade" id="a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Data Aset di Toko</h4>
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
       
        <!-- Penutup Div sidebar -->
        </div>
        </div>     

<!-- Ajax Button Tampil -->
<script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            var KD_STORE = $(this).attr("id");
            $.ajax({
                url: 'ajax/rekap/select.php',
                method: 'post',
                data: {KD_STORE:KD_STORE},
                success:function(data){
                    $('#data_aset').html(data);
                    $('#a').modal("show");
                }
            });
        });
    });
    $(document).ready(function(){
        $('.view_printer').click(function(){
            var KD_STORE = $(this).attr("id");
            $.ajax({
                url: 'ajax/rekap/printer.php',
                method: 'post',
                data: {KD_STORE:KD_STORE},
                success:function(data){
                    $('#data_aset').html(data);
                    $('#a').modal("show");
                }
            });
        });
    });
    $(document).ready(function(){
        $('.view_monitor').click(function(){
            var KD_STORE = $(this).attr("id");
            $.ajax({
                url: 'ajax/rekap/monitor.php',
                method: 'post',
                data: {KD_STORE:KD_STORE},
                success:function(data){
                    $('#data_aset').html(data);
                    $('#a').modal("show");
                }
            });
        });
    });
    $(document).ready(function(){
        $('.view_komputer').click(function(){
            var KD_STORE = $(this).attr("id");
            $.ajax({
                url: 'ajax/rekap/komputer.php',
                method: 'post',
                data: {KD_STORE:KD_STORE},
                success:function(data){
                    $('#data_aset').html(data);
                    $('#a').modal("show");
                }
            });
        });
    });
    $(document).ready(function(){
        $('.view_proyektor').click(function(){
            var KD_STORE = $(this).attr("id");
            $.ajax({
                url: 'ajax/rekap/proyektor.php',
                method: 'post',
                data: {KD_STORE:KD_STORE},
                success:function(data){
                    $('#data_aset').html(data);
                    $('#a').modal("show");
                }
            });
        });
    });
    $(document).ready(function(){
        $('.view_router').click(function(){
            var KD_STORE = $(this).attr("id");
            $.ajax({
                url: 'ajax/rekap/router.php',
                method: 'post',
                data: {KD_STORE:KD_STORE},
                success:function(data){
                    $('#data_aset').html(data);
                    $('#a').modal("show");
                }
            });
        });
    });
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