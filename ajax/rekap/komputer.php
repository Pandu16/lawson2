<?php
require '../../functions.php';
if(isset($_POST["KD_STORE"])){
        $output= "";
        $id = $_POST["KD_STORE"];
        $a = mysqli_query($koneksi, "SELECT nama_aset, sum(harga) a, count(*) c from aset inner join tipe on aset.id_tipe = tipe.id_tipe where aset.kd_store = '$id' and aset.id_tipe = 1 group by nama_aset");

        $nama_toko = query("SELECT NAMA_STORE from store where KD_STORE = '$id'")[0]["NAMA_STORE"];
        $total = query("SELECT sum(harga) a, count(*) c from aset inner join store on aset.kd_store = store.KD_STORE where aset.KD_STORE = '$id' and aset.id_tipe = 1")[0];
        $i = 1;
        $output .="<div class='row' id='row'>
        <div class='container'>
        <p class='text-center pb-3'><b>$nama_toko</b></p>
        <table class='table table-striped table-bordered border-dark'>
            <thead>
                <th class='text-center' width='5px'>No</th>
                <th class='text-center'>Nama Tipe</th>
                <th class='text-center'>Jumlah Komputer</th>
                <th class='text-center'>Sub Total</th>
            </thead>
            ";
        foreach ($a as $row) {
        $output .= "<tbody>
                    <tr>
                        <td class='text-center'> $i</td>
                        <td class='text-center'> $row[nama_aset]</td>
                        <td class='text-center'> $row[c]</td>
                        <td class='text-start'>Rp. <span>". number_format($row["a"],0,",",".")."</span></td>
                    </tr>
                    </tbody>";
        $i++;
        }
        $output.= "<tr>
        <td colspan='2' class='text-end'><b> Total </b></td>
        <td class='text-center'><b> $total[c] </b></td>
        <td><b> Rp. " . number_format($total['a'],0,",","."). "</b></td>
    </tr>";
    echo $output;
        } else {

        }
?>