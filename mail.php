<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body class="sb-nav-fixed">
<div class="container">
    <h2>Kirim Email dengan PHP</h2>
    <?php
    if (isset($_POST['kirim'])) {

        require 'PHPMailer/PHPMailerAutoload.php';
        $email_pengirim = "kelasprogrammer@gmail.com";
        $isi=$_POST['isi'];
        $subjek=$_POST['subjek'];
        $email_tujuan=$_POST['email_tujuan'];

        $mail = new PHPMailer();

        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $email_pengirim;  // alamat email kamu
        $mail->Password   = "1234567890";            // password GMail
        $mail->SetFrom($email_pengirim, 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = $subjek;
        $mail->Body       = $isi;
        $mail->AddAddress($email_tujuan);

        if(!$mail->Send()) {
            echo "Eror: ".$mail->ErrorInfo;
            exit;
        }else {
            echo "<div class='alert alert-success'><strong>Berhasil!</strong> Email telah berhasil dikirim.</div>";
        }
    }
    ?>
<br>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <input class="form-control" name="email_tujuan" placeholder="Email Tujuan:">
        </div>
        <div class="form-group">
            <input class="form-control" name="subjek" placeholder="Subjek:">
        </div>
        <div class="form-group">
            <textarea id="compose-textarea" name="isi" class="form-control" style="height: 300px" placeholder="Isi Email"></textarea>
        </div>

        <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>

    </form>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>