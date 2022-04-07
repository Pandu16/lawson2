<?php 
// koneksi db

use Dompdf\Dompdf;
use Dompdf\Options;

$koneksi = mysqli_connect("localhost","root","","lawson");

// set tanggal timezone default
date_default_timezone_set("Asia/Jakarta");

// query
function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// tambah data karyawan
function tambah_karyawan($data){
    global $koneksi;
    // ambil data dari tiap field
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama_lengkap"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $email = htmlspecialchars($data["email"]);

        // query insert data
        $query = "INSERT INTO karyawan values ('$nip', '$nama', '$jenis_kelamin', '$email')";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
}

function tambah_pemusnahan($data){
    global $koneksi;

    $serial_number = htmlspecialchars($data["serial_number"]);
    $nip = $data["nip"];
    $tgl = $data["tgl"];
    $jam = $data["jam"];
    $nama_aset = htmlspecialchars($data["nama_aset"]);
    $no_tag = htmlspecialchars($data["no_tag"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    $gambar= upload();
    $kd_store = htmlspecialchars($data["KD_STORE"]);
    $id_ruang = htmlspecialchars($data["id_ruang"]);
    $id_aset = htmlspecialchars($data["id_aset"]);

    if (!$gambar) {
        return false;
    }
    $query = "INSERT into pemusnahan (id_musnah, id_aset, nip, serial_number, no_tag, nama_aset, spesifikasi, kondisi, surat_jalan, kd_store, id_ruang, tgl, jam)
        values ('',
                '$id_aset',
                '$nip',
                '$serial_number',
                '$no_tag',
                '$nama_aset',
                '$spesifikasi',
                '$kondisi',
                '$gambar',
                '$kd_store',
                '$id_ruang',
                '$tgl',
                '$jam')
                ";

    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}
// Tambah multi query
// Tambah Pengecekan
function tambah($data){
    global $koneksi;

    // ambil data dari tiap field
    $serial_number = htmlspecialchars($data["serial_number"]);
    $no_tag = htmlspecialchars($data["no_tag"]);
    $nama_aset = htmlspecialchars($data["nama_aset"]);
    $id_tipe = htmlspecialchars($data["id_tipe"]);
    $merk_aset = htmlspecialchars($data["merk_aset"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $kegiatan = htmlspecialchars($data["kegiatan"]);
    $kd_store = $data["kd_store"];
    $tgl_cek = $data["tgl_cek"];
    $jam_cek = $data["jam_cek"];
    $kondisi = htmlspecialchars($data["kondisi"]);
    $id_ruang = htmlspecialchars($data["id_ruang"]);
    $nip = htmlspecialchars($data["nip"]);
    $total = htmlspecialchars($data["harga"]);
    $harga = preg_replace("/[^0-9]/", "", $total);


    // upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }

        // query insert data
        $query2 = "INSERT INTO pengecekan (id_pengecekan, serial_number, no_tag, nama_aset, merk_aset, spesifikasi, kegiatan, kd_store, gambar, tgl_cek, jam_cek, kondisi, id_tipe, id_ruang, nip, harga) 
                    values ('', 
                            '$serial_number', 
                            '$no_tag',
                            '$nama_aset',
                            '$merk_aset',
                            '$spesifikasi',
                            '$kegiatan', 
                            '$kd_store',
                            '$gambar',
                            '$tgl_cek',
                            '$jam_cek',
                            '$kondisi',
                            '$id_tipe',
                            '$id_ruang',
                            '$nip',
                            '$harga')";
        $query3 = "UPDATE aset set id_ruang = '$id_ruang', harga = '$harga', kondisi = '$kondisi', spesifikasi = '$spesifikasi' where serial_number = '$serial_number'";

    $sn = mysqli_query($koneksi, "SELECT serial_number from aset where serial_number = '$serial_number'");
    if (mysqli_fetch_assoc($sn) > 0) {
        mysqli_query($koneksi, $query2);
        mysqli_query($koneksi, $query3);
    } else {
        echo "<script> alert('Data Aset Tidak Ada');</script>";       
    }
    return mysqli_affected_rows($koneksi);
}

function mutasi_aset($data){
    global $koneksi;

    $serial_number_lama = $data["serial_number_lama"];
    $serial_number_baru = htmlspecialchars($data["serial_number_baru"]);
    $no_tag_lama = htmlspecialchars($data["no_tag_lama"]);
    $no_tag_baru = htmlspecialchars($data["no_tag_baru"]);
    $nama_aset = htmlspecialchars($data["nama_aset"]);
    $merk_aset = htmlspecialchars($data["merk_aset"]);
    $id_tipe = htmlspecialchars($data["id_tipe"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $KD_STORE = htmlspecialchars($data["KD_STORE"]);
    $id_ruang = htmlspecialchars($data["id_ruang"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    $nama_aset = htmlspecialchars($data["nama_aset"]);
    $alasan = htmlspecialchars($data["alasan"]);
    $nip = htmlspecialchars($data["nip"]);
    $tgl_histori = htmlspecialchars($data["tgl_histori"]);
    $jam = htmlspecialchars($data["jam"]);
    $id_aset = $data["id_aset"];

    $gambar = upload();
    if(!$gambar){
        return false;
    }

    $query = "INSERT histori (id_histori, sn_lama, sn_baru, no_tag_lama, no_tag_baru, nama_aset, alasan, nip, tgl_histori, jam, gambar)
                values ('',
                    '$serial_number_lama',
                    '$serial_number_baru',
                    '$no_tag_lama',
                    '$no_tag_baru',
                    '$nama_aset',
                    '$alasan',
                    '$nip',
                    '$tgl_histori',
                    '$jam',
                    '$gambar')
                 ";      

    $query2 = "UPDATE aset set 
                serial_number = '$serial_number_baru',
                no_tag = '$no_tag_baru',
                nama_aset = '$nama_aset',
                id_tipe = '$id_tipe',
                merk_aset = '$merk_aset',
                spesifikasi = '$spesifikasi',
                KD_STORE = '$KD_STORE', 
                id_ruang = '$id_ruang',
                kondisi = '$kondisi'
                where id_aset = '$id_aset'
                ";

    $cek_sn = query("SELECT serial_number from aset where serial_number = '$serial_number_baru' ");
    $cek_tag = query("SELECT no_tag from aset where no_tag = '$no_tag_baru' ");
    if (($serial_number_baru == $serial_number_lama) && ($no_tag_lama == $no_tag_baru)) {
        echo "<script> 
                alert('Tidak berhasil dimutasi karena serial number dan no tag tidak berubah!');
              </script>";
              return false;
    } else if((count($cek_sn) > 1) && (count($cek_tag) > 1))  {
        echo "<script> 
                alert('Serial Number dan Tag Sudah ada!');
              </script>";
              return false;
    } else if((count($cek_sn) > 1) || (count($cek_tag) > 1)  ){
        echo "<script> 
                alert('Serial Number Atau No Tag Sudah Ada!');
              </script>";
              return false;
    } else {
        mysqli_query($koneksi, $query2);
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }   
    
}


function ganti_sntag($data){
        global $koneksi;
    
        // ambil data dari tiap field
        $serial_number_baru = htmlspecialchars($data["serial_number_baru"]);
        $serial_number_lama = htmlspecialchars($data["serial_number_lama"]);
        $no_tag_baru = htmlspecialchars($data["no_tag_baru"]);
        $no_tag_lama = htmlspecialchars($data["no_tag_lama"]);
        $nama_aset = htmlspecialchars($data["nama_aset"]);
        $id_tipe = htmlspecialchars($data["id_tipe"]);
        $merk_aset = htmlspecialchars($data["merk_aset"]);
        $spesifikasi = htmlspecialchars($data["spesifikasi"]);
        $kegiatan = htmlspecialchars($data["kegiatan"]);
        $id_lokasi = $data["id_lokasi"];
        $tgl_cek = $data["tgl_cek"];
        $kondisi = htmlspecialchars($data["kondisi"]);
        $id_ruang = htmlspecialchars($data["id_ruang"]);
        $nip = htmlspecialchars($data["nip"]);
        $alasan = htmlspecialchars($data["alasan"]);

        // upload gambar
        $gambar = upload();
        if(!$gambar){
            return false;
        }
    
            $query ="INSERT INTO aset (serial_number, no_tag, nama_aset, id_tipe, merk_aset, spesifikasi, id_lokasi, id_ruang)
            values ('$serial_number_baru', '$no_tag_baru' , '$nama_aset', '$id_tipe', '$merk_aset', '$spesifikasi', '$id_lokasi','$id_ruang')";        
            // query insert data
            $query2 = "INSERT INTO pengecekan (id_pengecekan, serial_number, kegiatan, id_lokasi, gambar, tgl_cek, kondisi, id_tipe, id_ruang, nip) 
                        values ('', 
                                '$serial_number_baru', 
                                '$kegiatan', 
                                '$id_lokasi',
                                '$gambar',
                                '$tgl_cek',
                                '$kondisi',
                                '$id_tipe',
                                '$id_ruang',
                                '$nip')";

            $query3 = "INSERT into histori (id_histori, sn_lama, sn_baru, no_tag_lama, no_tag_baru, alasan, nip)
                        values ('', 
                                '$serial_number_lama', 
                                '$serial_number_baru', 
                                '$no_tag_lama', 
                                '$no_tag_baru', 
                                '$alasan',
                                '$nip')";
    
        
            mysqli_query($koneksi, $query);
            mysqli_query($koneksi, $query2);
            mysqli_query($koneksi, $query3);
            return mysqli_affected_rows($koneksi);
}


function tambah_aset($data){
    global $koneksi;
    
    // ambil data dari tiap field
    $serial_number = htmlspecialchars($data["serial_number"]);
    $no_tag = htmlspecialchars($data["no_tag"]);
    $nama_aset = htmlspecialchars($data["nama_aset"]);
    $id_tipe = htmlspecialchars($data["id_tipe"]);
    $merk_aset = htmlspecialchars($data["merk_aset"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $id_lokasi = htmlspecialchars($data["KD_STORE"]);
    $id_ruang = htmlspecialchars($data["id_ruang"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    $total = htmlspecialchars($data["harga"]);
    $harga = preg_replace("/[^0-9]/", "", $total);
    
        // query insert data
        $query = "INSERT INTO aset (id_aset, serial_number, no_tag, nama_aset, merk_aset, id_tipe, spesifikasi, kd_store, id_ruang, kondisi, harga)
                    values ('',
                            '$serial_number', 
                            '$no_tag', 
                            '$nama_aset', 
                            '$merk_aset', 
                            '$id_tipe',
                            '$spesifikasi',
                            '$id_lokasi',
                            '$id_ruang',
                            '$kondisi',
                            '$harga')
                            ";
    $cek_sn = query("SELECT serial_number from aset where serial_number = '$serial_number' ");
    $cek_tag = query("SELECT no_tag from aset where no_tag = '$no_tag' ");
    if ((count($cek_sn) < 1) && (count($cek_tag) <1)) {
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
    else {
        echo "<script> alert('Serial Number atau Tag Sudah Terdaftar!');</script>";
    }
}

function upload(){
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yg diupload
    if ($error === 4) {
        echo "<script> alert('Pilih gambar terlebih dahulu'); </script>";
        return false;
    }

    // cek apakah yg diupload adalah gambar
    $ekstensi_gambar_valid = ['jpg','jpeg','png'];
    $ekstensi_gambar = explode('.',$nama_file);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));
    if (!in_array($ekstensi_gambar, $ekstensi_gambar_valid)) {
        echo "<script> alert('Yang anda upload bukan gambar'); </script>";
    }

    // cek ukuran file
    if ($ukuran_file > 3000000) {
        echo "<script> alert('Ukuran file terlalu besar'); </script>";
    }

    // generate nama baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_gambar;

    // lolos pengecekan, gambar siap diupload ke:
    move_uploaded_file($tmp_name, 'img/'. $nama_file_baru);
    return $nama_file_baru;
}

function tambah_lokasi($data){
    global $koneksi;

    $kd_store = htmlspecialchars($data["KD_STORE"]);
    $nama_store = htmlspecialchars($data["NAMA_STORE"]);
    $kd_region = htmlspecialchars($data["KD_REGION"]);
    $kd_branch = htmlspecialchars($data["KD_BRANCH"]);
    $alias = htmlspecialchars($data["ALIAS"]);
    $alm1 = htmlspecialchars($data["ALAMAT1"]);
    $alm2 = htmlspecialchars($data["ALAMAT2"]);
    $alm3 = htmlspecialchars($data["ALAMAT3"]) ;
    $kode_pos = htmlspecialchars($data["KODE_POS"]);
    $TELP = htmlspecialchars($data["TELP"]);

    $query = "INSERT into store
                Values ('$kd_store', '$kd_region', '$kd_branch', '$nama_store', '$alias', '$alm1', '$alm2', '$alm3', '$kode_pos', '$TELP')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);

}

// Fungsi Pencarian
// cari lokasi
function cari($keyword){
    global $koneksi;

    $query = "SELECT * from store where NAMA_STORE like '%$keyword%' or 
    KD_STORE like '%$keyword%' or
    ALAMAT3 like '%$keyword%' or
    ALAMAT1 like '%$keyword%' or
    ALAMAT2 like '%$keyword%' or
    ALAMAT3 like '%$keyword%' or
    KODE_POS like '%$keyword%' or
    TELP like '%$keyword%' order by KD_STORE
    ";
    return query($query);
}

// cari laporan
function cari_laporan($keyword){
    global $koneksi;

    $query = "SELECT * from (pengecekan inner join store on pengecekan.kd_store = store.KD_STORE) inner join karyawan on pengecekan.nip = karyawan.nip where
              pengecekan.serial_number like '%$keyword%' or
              no_tag like '%$keyword%' or
              id_pengecekan like '%$keyword%' or
              nama_aset like '%$keyword%' or 
              merk_aset like '%$keyword%' or
              spesifikasi like '%$keyword%' or 
              kegiatan like '%$keyword%' or
              NAMA_STORE like '%$keyword%' or
              nama_lengkap like '%$keyword%' or
              pengecekan.nip like '%$keyword%'
              ";
    return query($query);
}

function cari_tanggal(){
    global $koneksi;

    $tgl_awal = $_POST["tgl_awal"];
    $tgl_akhir = $_POST["tgl_akhir"];

    $query = "SELECT * from (pengecekan inner join karyawan on pengecekan.nip = karyawan.nip) inner join store on pengecekan.kd_store = store.KD_STORE where tgl_cek between '$tgl_awal' and '$tgl_akhir'";
    return query($query);
}

function cari_tanggal_mutasi(){
    global $koneksi;

    $tgl_awal = $_POST["tgl_awal"];
    $tgl_akhir = $_POST ["tgl_akhir"];

    $query = "SELECT * from histori inner join karyawan on histori.nip = karyawan.nip  where tgl_histori between '$tgl_awal' and '$tgl_akhir' order by tgl_histori desc";
    return query($query);
}

// cari aset
function cari_aset($keyword){
    global $koneksi;
    global $data_perhal;
    global $awal_data;


    $query = "SELECT * from (aset inner join store on aset.kd_store = store.KD_STORE) inner join tipe on aset.id_tipe = tipe.id_tipe where 
    serial_number like '%$keyword%' or
    no_tag like '%$keyword%' or
    nama_aset like '%$keyword%' or
    merk_aset like '%$keyword%' or
    aset.id_tipe like '%$keyword%' or
    spesifikasi like '%$keyword%' or
    NAMA_STORE like '%$keyword%' 
    ";
    return query($query);
}

function cari_aset2($keyword){
    global $koneksi;
    global $data_perhal;
    global $awal_data;


    $query = "SELECT sum(harga) a, count(*) c,  nama_aset, merk_aset, nama_tipe, spesifikasi, kondisi, NAMA_STORE, aset.kd_store, aset.id_tipe from (aset inner join store on aset.kd_store = store.KD_STORE) inner join tipe on aset.id_tipe = tipe.id_tipe where 
    nama_aset like '%$keyword%' or
    nama_tipe like '%$keyword%' or
    NAMA_STORE like '%$keyword%'
    group by aset.kd_store
    "; 
    $result = count(query($query));
    $query2 = "SELECT sum(harga) a, count(*) c, nama_aset,  aset.kd_store, NAMA_STORE, merk_aset, nama_tipe, nama_store, kondisi, spesifikasi, aset.id_tipe from (aset inner join store on aset.kd_store = store.KD_STORE) inner join tipe on aset.id_tipe = tipe.id_tipe where 
    aset.kd_store like '%$keyword%' or
    NAMA_STORE like '%$keyword%'
    group by tipe.id_tipe";
    
    if ($result > 1){
    return query($query);
    } else {
    return query($query2);
    }
}

function cari_aset_rusak($keyword){
    global $koneksi;

    $query = "SELECT * from (aset inner join lokasi on aset.id_lokasi = lokasi.id_lokasi) inner join tipe on aset.id_tipe = tipe.id_tipe where kondisi = 'rusak' and 
    (serial_number like '%$keyword%' or
    no_tag like '%$keyword%' or
    nama_aset like '%$keyword%' or
    merk_aset like '%$keyword%' or
    aset.id_tipe like '%$keyword%' or
    spesifikasi like '%$keyword%' or
    nama_lokasi like '%$keyword%')
    ";
    return query($query);
}

// cari histori
function cari_histori($keyword){
    global $koneksi;

    $query = "SELECT * from (histori inner join karyawan on histori.nip = karyawan.nip) where 
    sn_lama like '%$keyword%' or
    sn_baru like '%$keyword%' or
    no_tag_lama like '%$keyword%' or
    no_tag_baru like '%$keyword%' or
    histori.nip like '%$keyword%' or
    nama_aset like '%$keyword%' or
    alasan like '%$keyword%' or
    nama_lengkap like '%$keyword%'
    order by tgl_histori desc
    ";

    return query($query);
}

// cari histori
function cari_pemusnahan($keyword){
    global $koneksi;

    $query = "SELECT * from ((pemusnahan inner join karyawan on pemusnahan.nip = karyawan.nip) inner join store on pemusnahan.kd_store = store.KD_STORE) inner join ruangan on pemusnahan.id_ruang = ruangan.id_ruang where 
    serial_number like '%$keyword%' or
    no_tag like '%$keyword%' or
    nama_aset like '%$keyword%' or
    spesifikasi like '%$keyword%' or
    kondisi like '%$keyword%' or
    pemusnahan.kd_store like '%$keyword%' or
    NAMA_STORE like '%$keyword%' or
    pemusnahan.nip like '%$keyword%' or
    nama_lengkap like '%$keyword%'
    order by tgl desc
    ";

    return query($query);
}

function cari_tanggal_musnah(){
    global $koneksi;

    $tgl_awal = $_POST["tgl_awal"];
    $tgl_akhir = $_POST ["tgl_akhir"];

    $query = "SELECT * from ((pemusnahan inner join karyawan on pemusnahan.nip = karyawan.nip) inner join store on pemusnahan.kd_store = store.KD_STORE) inner join ruangan on pemusnahan.id_ruang = ruangan.id_ruang  where tgl between '$tgl_awal' and '$tgl_akhir' order by tgl desc";
    return query($query);
}

function cari_karyawan($keyword){
    global $koneksi;

    $query = "SELECT * from karyawan where 
                nip like '%$keyword%' or
                nama_lengkap like '%$keyword%' or
                jenis_kelamin like '%$keyword%'";
    
    return query($query);
}

function pilih_lokasi($keyword){
    global $koneksi;

    $query = "SELECT * from aset inner join lokasi on aset.id_lokasi = lokasi.id_lokasi where id_lokasi = '$keyword'";
    return query($query);
}

function edit_karyawan($data){
    global $koneksi;

    $nip = htmlspecialchars($data["nip"]);
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $email = htmlspecialchars($data["email"]);

    $query = "UPDATE karyawan set
                nip = '$nip',
                nama_lengkap = '$nama_lengkap',
                jenis_kelamin = '$jenis_kelamin',
                email = '$email'
                where nip = '$nip'";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function edit_lokasi($data){
    global $koneksi;

    $id_lokasi = htmlspecialchars($data["id_lokasi"]);
    $nama_lokasi = htmlspecialchars($data["nama_lokasi"]);

    $query = "UPDATE lokasi set 
                id_lokasi = $id_lokasi, 
                nama_lokasi = '$nama_lokasi' where id_lokasi = '$id_lokasi'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function edit_toko($data){
    global $koneksi;

    $KD_STORE = htmlspecialchars($data["KD_STORE"]);
    $KD_REGION = htmlspecialchars($data["KD_REGION"]);
    $KD_BRANCH = htmlspecialchars($data["KD_BRANCH"]);
    $NAMA_STORE = htmlspecialchars($data["NAMA_STORE"]);
    $ALIAS = htmlspecialchars($data["ALIAS"]);
    $ALAMAT1 = htmlspecialchars($data["ALAMAT1"]);
    $ALAMAT2 = htmlspecialchars($data["ALAMAT2"]);
    $ALAMAT3 = htmlspecialchars($data["ALAMAT3"]);

    $query = "UPDATE store set 
                KD_STORE = '$KD_STORE', 
                KD_REGION = '$KD_REGION', 
                KD_BRANCH = '$KD_BRANCH',
                NAMA_STORE = '$NAMA_STORE',
                ALIAS = '$ALIAS',
                ALAMAT1 = '$ALAMAT1',
                ALAMAT2 = '$ALAMAT2',
                ALAMAT3 = '$ALAMAT3' where KD_STORE = '$KD_STORE'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function edit_aset($data){
    global $koneksi;

    $serial_number = htmlspecialchars($data["serial_number"]);
    $id_aset = $_GET["id_aset"];
    $no_tag = htmlspecialchars($data["no_tag"]);
    $nama_aset = htmlspecialchars($data["nama_aset"]);
    $merk_aset = htmlspecialchars($data["merk_aset"]);
    $id_tipe = htmlspecialchars($data["id_tipe"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $kd_store = htmlspecialchars($data["KD_STORE"]);
    $id_ruang = htmlspecialchars($data["id_ruang"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    $total = htmlspecialchars($data["harga"]);
    $harga = preg_replace("/[^0-9]/", "", $total);

    $query = "UPDATE aset set 
                serial_number = '$serial_number',
                no_tag = '$no_tag',
                nama_aset = '$nama_aset',
                id_tipe = '$id_tipe',
                merk_aset = '$merk_aset',
                spesifikasi = '$spesifikasi',
                kd_store = '$kd_store', 
                id_ruang = '$id_ruang',
                kondisi = '$kondisi',
                harga = '$harga'
                where id_aset = $id_aset
                ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function hapus_karyawan($nip){
    global $koneksi;
    mysqli_query($koneksi, "DELETE from karyawan where nip = '$nip'");
}

function hapus_toko($kd_store){
    global $koneksi;
    mysqli_query($koneksi, "DELETE from store where KD_STORE = '$kd_store'");

    return mysqli_affected_rows($koneksi);
}


function hapus_aset($id_aset){
    global $koneksi;
    mysqli_query($koneksi, "DELETE from aset where id_aset = '$id_aset' ");
    
    return mysqli_affected_rows($koneksi);
}

function musnah($id_musnah){
    global $koneksi;

    $id_aset = $_GET["id_aset"];
    $img = 'img/'.$_GET["surat_jalan"];
    kirim_email();
    mysqli_query($koneksi, "DELETE from aset where id_aset = '$id_aset'");
    mysqli_query($koneksi, "DELETE from pemusnahan where id_musnah = '$id_musnah' ");
    unlink($img);
    
    return mysqli_affected_rows($koneksi);
}

function tolak($id_musnah){
    global $koneksi;

    $img = 'img/'.$_GET["surat_jalan"];

    mysqli_query($koneksi, "DELETE from pemusnahan where id_musnah = '$id_musnah' ");
    unlink($img);

    return mysqli_affected_rows($koneksi);
}

function hapus_pengecekan($id_pengecekan){
    global $koneksi;
    
    $img = 'img/'.$_GET["gambar"];
    mysqli_query($koneksi, "DELETE from pengecekan where id_pengecekan = '$id_pengecekan' ");
    unlink($img);
    
    return mysqli_affected_rows($koneksi);
}

function hangus($serial_number,$no_tag){
    global $koneksi;

    mysqli_query($koneksi, "DELETE fom aset where serial_number = '$serial_number' or no_tag = '$no_tag' ");
}

function registrasi($data){
    global $koneksi;

    $nip = htmlspecialchars($data["nip"]);
    $username = strtolower(stripslashes(htmlspecialchars($data["username"])));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $level = htmlspecialchars($data["level"]);

    $result= mysqli_query($koneksi, "SELECT nip from karyawan where nip = '$nip'");
    $result2= mysqli_query($koneksi, "SELECT nip from user where nip = '$nip'");
    if (!mysqli_fetch_assoc($result)) {
        echo "<script>
                alert(' Anda Tidak Terdaftar Sebagai Karyawan ');
              </script>";
        return false;
    } else if(mysqli_fetch_assoc($result2)){
        echo "<script>
                alert(' NIP Sudah Terdaftar ');
              </script>";
        return false;
    }
    $query = "INSERT into user values ('','$username', '$password', '$level', '$nip')";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}

function send_email(){
    require 'PHPMailer/PHPMailerAutoload.php';

    $id_aset = $_GET["id_aset"];
    $surel = $_SESSION["email"];
    $serial_number = query("SELECT serial_number from aset where id_aset = '$id_aset'")[0]["serial_number"];
    $nama_aset = query("SELECT nama_aset from aset where id_aset = '$id_aset'")[0]["nama_aset"];
    $no_tag = query("SELECT no_tag from aset where id_aset = '$id_aset'")[0]["no_tag"];
    $email = $_GET["email"];


    $email_pengirim = $surel;
    $isi= "<b>Pengajuan Pemusnahan Aset Dengan Keterangan:</b>
    <table border='1' cellspacing='0' class='table table-striped table-bordered border border-dark border-3'>
        <tr>
            <td>Serial Number</td>
            <td>:</td>
            <td>$serial_number</td>
        </tr>
        <tr>
            <td>No Tag</td>
            <td>:</td>
            <td>$no_tag</td>
        </tr>
        <tr>
            <td>Nama Aset</td>
            <td>:</td>
            <td>$nama_aset</td>
        </tr>
    </table> <br> <b>Ditolak!</b>";
    $subjek= "Penolakan Pemusnahan";
    $email_tujuan= $email;

    $mail = new PHPMailer();

    $mail->IsHTML(true);    // set email format to HTML
    $mail->IsSMTP();   // we are going to use SMTP
    $mail->SMTPAuth   = true; // enabled SMTP authentication
    $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
    $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
    $mail->Port       = 465;                   // SMTP port to connect to GMail
    $mail->Username   = $email_pengirim;  // alamat email kamu
    $mail->Password   = "starking";            // password GMail
    $mail->SetFrom($email_pengirim, 'noreply');  //Siapa yg mengirim email
    $mail->Subject    = $subjek;
    $mail->Body       = $isi;
    $mail->AddAddress($email_tujuan);

    if(!$mail->Send()) {
        echo "Eror: ".$mail->ErrorInfo;
        exit;
    }else {
        
    }
}

function kirim_email(){
    require 'PHPMailer/PHPMailerAutoload.php';

    $email = $_GET["email"];
    $id_aset = $_GET["id_aset"];
    $surel = $_SESSION["email"];
    $serial_number = query("SELECT serial_number from aset where id_aset = '$id_aset'")[0]["serial_number"];
    $nama_aset = query("SELECT nama_aset from aset where id_aset = '$id_aset'")[0]["nama_aset"];;
    $no_tag = query("SELECT no_tag from aset where id_aset = '$id_aset'")[0]["no_tag"];

    $email_pengirim = $surel;
    $isi= "<b>Pengajuan Pemusnahan Aset Dengan:</b>
    <table border='1' cellspacing='0' class='table table-striped table-bordered border border-dark border-3'>
        <tr>
            <td>Serial Number</td>
            <td>:</td>
            <td>$serial_number</td>
        </tr>
        <tr>
            <td>No Tag</td>
            <td>:</td>
            <td>$no_tag</td>
        </tr>
        <tr>
            <td>Nama Aset</td>
            <td>:</td>
            <td>$nama_aset</td>
        </tr>
    </table> <br> <b>Diterima!</b>";
    $subjek= "Pengajuan Pemusnahan Aset Diterima";
    $email_tujuan= $email;

    $mail = new PHPMailer();

    $mail->IsHTML(true);    // set email format to HTML
    $mail->IsSMTP();   // we are going to use SMTP
    $mail->SMTPAuth   = true; // enabled SMTP authentication
    $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
    $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
    $mail->Port       = 465;                   // SMTP port to connect to GMail
    $mail->Username   = $email_pengirim;  // alamat email kamu
    $mail->Password   = "starking";            // password GMail
    $mail->SetFrom($email_pengirim, 'noreply');  //Siapa yg mengirim email
    $mail->Subject    = $subjek;
    $mail->Body       = $isi;
    $mail->AddAddress($email_tujuan);

    
    if(!$mail->Send()) {
        echo "Eror: ".$mail->ErrorInfo;
        exit;
    }else {
        
    }
}

function topdf(){
    require_once("dompdf/autoload.inc.php");


    // $tgl_awal = $_POST["tgl_awal"];
    // $tgl_akhir = $_POST["tgl_akhir"];
    

    $laporan = query("SELECT * from (((pengecekan inner join store on pengecekan.kd_store = store.KD_STORE) 
    inner join ruangan on pengecekan.id_ruang = ruangan.id_ruang)
    inner join tipe on pengecekan.id_tipe = tipe.id_tipe)
    inner join karyawan on pengecekan.nip = karyawan.nip order by tgl_cek asc, jam_cek asc");
    
    
    $html = "Laporan Pengecekan Aset
            <table border='1' cellspacing='0'>
            <tr>
                <td width='5px'>No</td>
                <td width='100px'>Tanggal</td>
                <td>Nama Pengecek</td>
                <td width='200px'>Nama Aset</td>
                <td>Nama Toko</td>
                <td width='300px'>Spesifikasi</td>
                <td width='15px'>Kondisi</td>
            </tr> ";
    $i=1;
    foreach ($laporan as $row){
        $html .="
                <tr>
                    <td> $i</td>
                    <td>". date('d M Y', strtotime($row['tgl_cek'])). "</td>
                    <td> $row[nama_lengkap]</td>
                    <td> $row[nama_aset]</td>
                    <td> $row[NAMA_STORE]</td>
                    <td> $row[spesifikasi]</td>
                    <td> $row[kondisi]</td>
                </tr>";
       $i++;
    }
                
        $html .="
                    </table>
                </body>
                </html>";
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4","landscape");
    $dompdf->render();
    $dompdf->stream('laporan.pdf',array("Attachment"=>0));
}

function topdf2(){
    require_once("dompdf/autoload.inc.php");

    $tgl_awal = $_POST["tgl_awal"];
    $tgl_akhir = $_POST["tgl_akhir"];
    $tgl = date('d M Y');

    $laporan = query("SELECT * from (((pengecekan inner join store on pengecekan.kd_store = store.KD_STORE) 
    inner join ruangan on pengecekan.id_ruang = ruangan.id_ruang)
    inner join tipe on pengecekan.id_tipe = tipe.id_tipe)
    inner join karyawan on pengecekan.nip = karyawan.nip where tgl_cek between '$tgl_awal' and '$tgl_akhir' order by tgl_cek asc, jam_cek asc");
    
    
    $html = "Laporan Pengecekan Aset (Per $tgl)
            <table border='1' cellspacing='0'>
            <tr>
                <td width='5px'>No</td>
                <td width='100px'>Tanggal</td>
                <td>Nama Pengecek</td>
                <td width='200px'>Nama Aset</td>
                <td>Nama Toko</td>
                <td width='300px'>Spesifikasi</td>
                <td width='15px'>Kondisi</td>
            </tr> ";
    $i=1;
    foreach ($laporan as $row){
        $html .="
                <tr>
                    <td> <center> $i </center></td>
                    <td>". date('d M Y', strtotime($row['tgl_cek'])). "</td>
                    <td> $row[nama_lengkap]</td>
                    <td> $row[nama_aset]</td>
                    <td> $row[NAMA_STORE]</td>
                    <td> $row[spesifikasi]</td>
                    <td> $row[kondisi]</td>
                </tr>";
       $i++;
    }
                
        $html .="
                    </table>
                </body>
                </html>";
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4","landscape");
    $dompdf->render();
    $dompdf->stream('Laporan Pengecekan per '. $tgl .'.pdf');
}

function topdf3(){
    require_once("dompdf/autoload.inc.php");

    $keyword = $_POST["nama"];
    $tgl = date('d M Y');

    $laporan = query("SELECT * from (((pengecekan inner join store on pengecekan.kd_store = store.KD_STORE) 
    inner join ruangan on pengecekan.id_ruang = ruangan.id_ruang)
    inner join tipe on pengecekan.id_tipe = tipe.id_tipe)
    inner join karyawan on pengecekan.nip = karyawan.nip where pengecekan.nama_aset like '%$keyword%' order by tgl_cek asc, jam_cek asc");
    
    
    $html = "Laporan Pengecekan Aset (Per $tgl)
            <table border='1' cellspacing='0'>
            <tr>
                <td width='5px'>No</td>
                <td width='100px'>Tanggal</td>
                <td>Nama Pengecek</td>
                <td width='200px'>Nama Aset</td>
                <td>Nama Toko</td>
                <td width='300px'>Spesifikasi</td>
                <td width='15px'>Kondisi</td>
            </tr> ";
    $i=1;
    foreach ($laporan as $row){
        $html .="
                <tr>
                    <td> <center> $i </center></td>
                    <td>". date('d M Y', strtotime($row['tgl_cek'])). "</td>
                    <td> $row[nama_lengkap]</td>
                    <td> $row[nama_aset]</td>
                    <td> $row[NAMA_STORE]</td>
                    <td> $row[spesifikasi]</td>
                    <td> $row[kondisi]</td>
                </tr>";
       $i++;
    }
                
        $html .="
                    </table>
                </body>
                </html>";
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4","landscape");
    $dompdf->render();
    $dompdf->stream('Laporan Pengecekan per '. $tgl .'.pdf');
}

function detailpdf(){
    require_once("dompdf/autoload.inc.php");
    global $koneksi;
    $id_pengecekan = $_POST["id_pengecekan"];
    
    $result = query("SELECT * from (((pengecekan inner join store on pengecekan.kd_store = store.KD_STORE)
                inner join tipe on pengecekan.id_tipe = tipe.id_tipe)
                inner join ruangan on pengecekan.id_ruang = ruangan.id_ruang)
                inner join karyawan on pengecekan.nip = karyawan.nip
                where id_pengecekan = '$id_pengecekan'")[0];
    $date = mysqli_query($koneksi, "SELECT tgl_cek from pengecekan where id_pengecekan = '$id_pengecekan' ");
    $row = mysqli_fetch_assoc($date);
    $tanggal = $row["tgl_cek"];

    $html = " <h1> Laporan Detail Pengecekan $id_pengecekan </h1> <hr><table class='table table-bordered'>
                    <tr>
                        <td>Waktu Pengecekan</td>
                        <td>:</td>
                        <td>". date("l, d F Y", strtotime($tanggal)) . " / " . $result["jam_cek"]."</td>
                    </tr>";

    $html .= "<tr>
                <td>ID Pengecekan</td>
                <td>:</td>
                <td>$result[id_pengecekan]</td>
            </tr>
            <tr>
                <td>NIP </td>
                <td>:</td>
                <td> $result[nip]</td>
            </tr>
            <tr>
                <td>Nama Karyawan</td>
                <td>:</td>
                <td> $result[nama_lengkap]</td>
            </tr>
            <tr>
                <td>Serial Number</td>
                <td>:</td>
                <td> $result[serial_number]</td>
            </tr>
            <tr>
                <td>No Tag</td>
                <td>:</td>
                <td> $result[no_tag]</td>
            </tr>
            <tr>
                <td>Nama Aset</td>
                <td>:</td>
                <td> $result[nama_aset]</td>
            </tr>
            <tr>
                <td>Tipe Aset</td>
                <td>:</td>
                <td> $result[nama_tipe]</td>
            </tr>
            <tr>
                <td>Merk Aset</td>
                <td>:</td>
                <td> $result[merk_aset]</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>Rp. ". number_format($result["harga"],0,',','.')."</td>
            </tr>
            <tr>
                <td>Spesifikasi</td>
                <td>:</td>
                <td> $result[spesifikasi]</td>
            </tr>
            <tr>
                <td>Kondisi</td>
                <td>:</td>
                <td> $result[kondisi]</td>
            </tr>
            <tr>
                <td>Kegiatan</td>
                <td>:</td>
                <td> $result[kegiatan]</td>
            </tr>
            <tr>
                <td>Toko</td>
                <td>:</td>
                <td> $result[NAMA_STORE]</td>
            </tr>
            <tr>
                <td>Ruangan</td>
                <td>:</td>
                <td> $result[nama_ruang]</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td> $result[ALAMAT1],  $result[ALAMAT2]</td>
            </tr>
            <tr>
                <td>Foto Kegiatan</td>
                <td>:</td>
                <td> <img src='http://localhost/lawson/img/$result[gambar]' alt='' width='50%'></td>
            </tr>
        </table>";

    $options = new Options();
    $options->setIsRemoteEnabled(true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->output();
    $dompdf->setPaper("A4","potrait");
    $dompdf->render();
    $dompdf->stream('Laporan Detail Pengecekan '. $id_pengecekan .'.pdf', array("Attachment" => 0));
}

function footer(){
    return file_get_contents('templates/footer.php');
}

function navbar(){
    return file_get_contents('templates/navbar.php');
}

function sidebar(){
    return file_get_contents('templates/sidebar.php');
}

function sidebarsup(){
    return file_get_contents('templates/sidebarsup.php');
}

function tampil_cek(){
    return file_get_contents('templates/tampilcek.php');
}

function sidebarasli(){
    return file_get_contents('templates/sidebarasli.php');
}

function sidebarman(){
    return file_get_contents('templates/sidebarman.php');
}

// Tampil Form

function form_aset_normal(){
    global $koneksi;
    global $tgl_cek;
    global $karyawan;
    global $row;
    
    echo "<div class='col py-3 mx-4'>
    <h1 align='center' class='mb-3'> Pengecekan Asset </h1> <hr>
    <form action='' method='post' enctype='multipart/form-data'>
                    <input type='hidden' name='tgl_cek' value='$tgl_cek'>
                    <div class='mb-3'>
                            <label for='nip' class='form-label'>NIP Karyawan</label>
                            <input type='text' class='form-control  shadow-sm' id='nip' name='nip' value='$karyawan[nip]' required readonly>
                        </div>
    
                        <div class='mb-3'>
                            <label for='serial_number' class='form-label'>Serial Number</label>
                            <input type='number' class='form-control  shadow-sm' id='serial_number' name='serial_number' required>
                        </div>
                        <div class='mb-3'>
                            <label for='no_tag' class='form-label'>No Tag</label>
                            <input type='text' class='form-control  shadow-sm' id='no_tag' name='no_tag' required>
                        </div>
                        <div class='mb-3'>
                            <label for='id_ruang' class='form-label'>Ruangan</label>
                            <select class='form-select shadow-sm' name='id_ruang' id=''>
                                <option selected hidden>Pilih Ruangan</option>
                                <option value='1'>HRD</option>
                                <option value='2'>Finance</option>
                                <option value='3'>Marketing</option>
                                <option value='4'>IT</option>
                                <option value='5'>Kasir</option>
                            </select>
                        </div>
                        <div class='mb-3'>
                            <label for='nama_aset' class='form-label'>Nama Aset</label>
                            <input type='text' class='form-control  shadow-sm' id='nama_aset' name='nama_aset' required>
                        </div>
                        <div class='mb-3'>
                            <label for='id_tipe' class='form-label'>Tipe Aset</label>
                            <select class='form-select shadow-sm' name='id_tipe' id=''>
                                <option selected hidden>Pilih Tipe Aset</option>
                                <option value='1'>Komputer</option>
                                <option value='2'>Monitor</option>
                                <option value='3'>Printer</option>
                                <option value='4'>Proyektor</option>
                                <option value='5'>Router</option>
                            </select>
                        </div>
                        <div class='mb-3'>
                            <label for='merk_aset' class='form-label'>Merk Aset</label>
                            <input type='text' class='form-control  shadow-sm' id='merk_aset' name='merk_aset' required>
                        </div>
                        <div class='mb-3'>
                            <label for='spesifikasi' class='form-label'>Spesifikasi</label>
                            <textarea class='form-control  shadow-sm' id='spesifikasi' name='spesifikasi' required></textarea>
                        </div>
                        <div class='mb-3'>
                            <label for='kondisi' class='form-label'>Kondisi</label>
                            <input type='text' class='form-control  shadow-sm' id='kondisi' name='kondisi' required>
                        </div>
                        <div class='mb-3'>
                            <label for='kegiatan' class='form-label'>Kegiatan yang dilakukan</label>
                            <input type='text' class='form-control  shadow-sm' id='kegiatan' name='kegiatan' required>
                        </div>
                        <div class='mb-3'>
                            <label for='gambar' class='form-label'>Upload bukti kegiatan</label>
                            <input type='file' class='form-control  shadow-sm' id='gambar' name='gambar' required>
                        </div>
                        <input type='hidden' name='id_lokasi' value='$row'>
                        <button type='submit' class='btn btn-primary' name='submit'>Submit</button>
                    </form>";
}

function form_ganti_sntag(){
    global $koneksi;
    global $tgl_cek;
    global $karyawan;
    global $row;
    
    echo "<div class='col py-3 mx-4'>
    <h1 align='center' class='mb-3'> Pengecekan Asset </h1> <hr>
    <form action='' method='post' enctype='multipart/form-data'>
                    <input type='hidden' name='tgl_cek' value='$tgl_cek'>
                    <div class='mb-3'>
                            <label for='nip' class='form-label'>NIP Karyawan</label>
                            <input type='text' class='form-control  shadow-sm' id='nip' name='nip' value='$karyawan[nip]' required readonly>
                        </div>
                        <div class='row'>
                            <div class='mb-3 col'>
                                <label for='serial_number_lama' class='form-label'>Serial Number Lama</label>
                                <input type='number' class='form-control  shadow-sm' id='serial_number_lama' name='serial_number_lama' required>
                            </div>
                            <div class='mb-3 col'>
                                <label for='serial_number_baru' class='form-label'>Serial Number Baru</label>
                                <input type='number' class='form-control  shadow-sm' id='serial_number_baru' name='serial_number_baru' required>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='mb-3 col'>
                                <label for='no_tag_lama' class='form-label'>No Tag Lama</label>
                                <input type='text' class='form-control  shadow-sm' id='no_tag_lama' name='no_tag_lama' required>
                            </div>
                            <div class='mb-3 col'>
                                <label for='no_tag_baru' class='form-label'>No Tag baru</label>
                                <input type='text' class='form-control  shadow-sm' id='no_tag_baru' name='no_tag_baru' required>
                            </div>
                        </div>
                        <div class='mb-3'>
                                <label for='alasan' class='form-label'>Keterangan Pergantian</label>
                                <input type='text' class='form-control  shadow-sm' id='alasan' name='alasan' required>
                            </div>
                        <div class='mb-3'>
                            <label for='id_ruang' class='form-label'>Ruangan</label>
                            <select class='form-select shadow-sm' name='id_ruang' id=''>
                                <option selected hidden>Pilih Ruangan</option>
                                <option value='1'>HRD</option>
                                <option value='2'>Finance</option>
                                <option value='3'>Marketing</option>
                                <option value='4'>IT</option>
                                <option value='5'>Kasir</option>
                            </select>
                        </div>
                        <div class='mb-3'>
                            <label for='nama_aset' class='form-label'>Nama Aset</label>
                            <input type='text' class='form-control  shadow-sm' id='nama_aset' name='nama_aset' required>
                        </div>
                        <div class='mb-3'>
                            <label for='id_tipe' class='form-label'>Tipe Aset</label>
                            <select class='form-select shadow-sm' name='id_tipe' id=''>
                                <option selected hidden>Pilih Tipe Aset</option>
                                <option value='1'>Komputer</option>
                                <option value='2'>Monitor</option>
                                <option value='3'>Printer</option>
                                <option value='4'>Proyektor</option>
                                <option value='5'>Router</option>
                            </select>
                        </div>
                        <div class='mb-3'>
                            <label for='merk_aset' class='form-label'>Merk Aset</label>
                            <input type='text' class='form-control  shadow-sm' id='merk_aset' name='merk_aset' required>
                        </div>
                        <div class='mb-3'>
                            <label for='spesifikasi' class='form-label'>Spesifikasi</label>
                            <textarea class='form-control  shadow-sm' id='spesifikasi' name='spesifikasi' required></textarea>
                        </div>
                        <div class='mb-3'>
                            <label for='kondisi' class='form-label'>Kondisi</label>
                            <input type='text' class='form-control  shadow-sm' id='kondisi' name='kondisi' required>
                        </div>
                        <div class='mb-3'>
                            <label for='kegiatan' class='form-label'>Kegiatan yang dilakukan</label>
                            <input type='text' class='form-control  shadow-sm' id='kegiatan' name='kegiatan' required>
                        </div>
                        <div class='mb-3'>
                            <label for='gambar' class='form-label'>Upload bukti kegiatan</label>
                            <input type='file' class='form-control  shadow-sm' id='gambar' name='gambar' required>
                        </div>
                        <input type='hidden' name='id_lokasi' value='$row'>
                        <button type='submit' class='btn btn-primary' name='submit'>Submit</button>
                    </form>";
}
?>