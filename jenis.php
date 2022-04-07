<?php 

require 'functions.php';


$id = $_GET["KD_STORE"];
$query = mysqli_query($koneksi, "SELECT id_tipe, nama_tipe, count(*) from (aset inner join tipe on aset.id_tipe = tipe.id_tipe) inner join store on aset.kd_store = store.KD_STORE where id_aset = '$id'");
$a = mysqli_query($koneksi, "SELECT id_tipe, nama_tipe, count(*) from (aset inner join tipe on aset.id_tipe = tipe.id_tipe) inner join store on aset.kd_store = store.KD_STORE where aset.kd_store = '$id'");
?>

<div class='row'>
    <table>
        <tr>
            <td>No</td>
            <td>Nama Tipe</td>
            <td>Jumlah</td>
        </tr>
        <tr>
            <?php $i=1; foreach ($a as $row) :?>
                <td><?= $i;?></td>
                <td><?= $row['nama_tipe'];?></td>
                <td><?= $row['count(*)'];?></td>
            <?php endforeach; $i++?>
        </tr>
    </table>
</div>
