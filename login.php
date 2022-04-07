<?php 
session_start();
require 'functions.php';

if(isset($_SESSION["login"])){
    header("Location: index.php");
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($koneksi, "SELECT * from user inner join karyawan on user.nip = karyawan.nip where username = '$username' and password = '$password'");
    $fetch = mysqli_fetch_array($result);
    // $user = $fetch["username"];
    // $pswrd = $fetch["password"];
    // $level = $fetch["level"];    
    // $nip = $fetch["nip"];
    // cek username dan password

    if (mysqli_num_rows($result) == 1) {
            $_SESSION["login"] = true;
            $_SESSION["nip"] = $fetch["nip"];
            $_SESSION["level"] = $fetch["level"];
            $_SESSION["email"] = $fetch["email"];
            header("Location: index.php");
            exit;
        } else {
            echo "<script> alert('Data tidak ada'); </script>";
        }
    }
    $error = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body class="bg-dark">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-5 text-light">
                </div>
                <div class="card shadow-lg bg-dark border rounded text-light">
                <center><img src="assets/gambar/logo.svg" alt="" width="30%" class="pt-3"></center>
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                        <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="username">Username</label>
                                <input id="username" type="text" class="form-control  shadow-sm rounded-pill" name="username" value="" required autofocus>
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control  shadow-sm rounded-pill" name="password" required>
                            </div>

                            <div class="d-grid pt-3">
                                <button type="submit" class="btn btn-primary rounded-pill" name="login">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Don't have an account? <a href="registrasi.php" class="text-light">Create One</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5 text-light">
                    Copyright &copy; 2021
                </div>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>