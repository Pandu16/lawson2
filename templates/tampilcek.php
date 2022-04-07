<?php
require 'functions.php';
$tgl = date("Y-m-d");
$pengecekan = query("SELECT * from pengecekan where tgl_cek = '$tgl'");
?>
<table class="shadow sm sm table table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>Tanggal Pengecekan</th>
                    <th>Nama Aset</th>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengecekan as $row) : ?>
                    <tr>
                        <td> <?= $i++; ?></td>
                        <td><?= $row["tgl_cek"] ;?> </td>
                        <td><?= $row["nama_aset"] ;?> </td>
                    </tr>
                    <?php endforeach ;?>
                </tbody>       
            </table>