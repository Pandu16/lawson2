<?php
require 'functions.php';

if(isset($_POST["register"])){
    if (registrasi($_POST) > 0) {
        echo " <script>
                 alert(' User Baru Berhasil Ditambahkan ');
               </script> ";
    } else{
        mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hovergambar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body class="sb-nav-fixed">
<div class="container">
    <form action="" method="post" class="form-control my-5 ">
    <h1 class="mb-3">Form Registrasi</h1>
    <div class="mb-2 row">
        <div class="col-sm-2">
            <label for="nip"> NIP </label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="nip" id="" required>
        </div>
    </div>
    <div class="mb-2 row">
        <div class="col-sm-2">
            <label for="username"> Username </label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="username" id="" required>
        </div>
    </div>
    <div class="mb-2 row">
        <div class="col-sm-2">
            <label for="password"> Password </label>
        </div>
        <div class="col-sm-10">
            <input type="password" name="password" id="" required>
        </div>
    </div>
    <div class="mb-2 row">
        <div class="col-sm-2">
                  <label for="level">Level</label>
        </div>
        <div class="col-sm-10">
            <select name="level" id="level" required>
                    <option value="support">Support</option>
                    <option value="manajer">Manajer</option>
            </select>
        </div>
    </div>
        <button class="btn btn-primary" type="submit" name="register"> Register </button>
    </form>
    <a href="login.php"><button class="btn btn-primary"> Back </button></a>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>