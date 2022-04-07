<?php 
$karyawan = query("SELECT * from karyawan inner join user on karyawan.nip = user.nip where karyawan.nip = '$nip' ")[0];
?>
<div id="layoutSidenav">
<div id="layoutSidenav_nav" class="d-print-none">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <?php if ($level == 'support') :?>
                <a class="nav-link" href="pengecekan.php">
                    <div class="sb-nav-link-icon"><i class="bi bi-pen-fill"></i></div>
                    Checklist Aset
                </a>
                <a class="nav-link" href="pengajuan_pemusnahan.php">
                    <div class="sb-nav-link-icon"><i class="bi bi-file-text"></i></div>
                    Ajukan Pemusnahan
                </a>
                <?php endif;?>

                <?php if ($level != 'support'):?>
                <a class="nav-link" href="pemusnahan.php">
                    <div class="sb-nav-link-icon"><i class="bi bi-envelope"></i></div>
                    Pemusnahan
                </a>
                <?php endif;?>
                
                <div class="sb-sidenav-menu-heading">Data</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Master
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="lokasi_toko.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-shop"></i></div>
                        Toko
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#aset" aria-expanded="false" aria-controls="aset">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Aset
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>    
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionAset">
                            <div class="collapse" id="aset" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionAset">
                                <a class="nav-link" href="aset.php">CRUD Aset</a>
                                <a class="nav-link" href="aset2.php">Search Aset</a>
                            </div>
                        </nav>
                        <?php if ($level == 'manajer') :?>
                        <a class="nav-link" href="karyawan.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                        Karyawan</a>
                        <?php endif;?>
                </div>
                <?php if ($level =='manajer') :?>
                <div class="sb-sidenav-menu-heading">Laporan</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseLaporan" aria-expanded="false" aria-controls="pagesCollapseLaporan">
                    Laporan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseLaporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="laporan.php">Laporan Pengecekan</a>
                        <a class="nav-link" href="rekap.php">Rekap Aset</a>
                        <a class="nav-link" href="history.php">Laporan Mutasi</a>
                    </nav>
                </div>
                <?php endif;?>
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"></div>
                    
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"></div>
                    
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: <?= $karyawan["nama_lengkap"];?></div>
            <?= $karyawan["level"];?>
        </div>
    </nav>
</div>