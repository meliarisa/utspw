<?php
include "konfigurasi.php";
session_start();
$psn = "";
if(isset($_POST['txLOGIN'])){
    $user = $_POST['txUSER'];
    $pass = md5($_POST['txPASS']);
    $sql = "SELECT * FROM tbadmin WHERE username = '$user'";
    $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die ("Gagal Koneksi Database");
    $result = mysqli_query($cnn,$sql);
    $nilai = mysqli_num_rows($result);
    if($nilai > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION["login"] = $row['iduser'];
        if($row['passkey'] == $pass){
            $psn = "Berhasil Login";
            header('location:dashboard.php');
        }
    }else{
        $psn = "Gagal Login";    
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div><?= $psn; ?></div>

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center" style="margin-top:10%">
                <form class="border border-dark p-3 " method="post" action="">
                    <div class="bg-danger text-center  rounded">
                        <label class="form-label p-2 text-light fs-4"><b>Sistem Informasi Akademik</b></label>
                    </div>
                    <div class="mb-3 mt-3">
                        <input class="form-control" type="text" name="txUSER" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" name="txPASS" placeholder="Password">
                    </div>
                    <div class="bg-primary text-center rounded">
                        <button class="btn text-light fs-5" type="submit" name="txLOGIN"><b>Login</b></button>
                    </div>
                    <p>Belum punya akun <b><a href="register.php" style="text-decoration:none">DAFTAR DI SINI</a></b></p>
                </form>
        </div>
    </div>

</div>



    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>