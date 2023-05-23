<?php
include "konfigurasi.php";
$psn = "";
if(isset($_POST['txNAMA'])) {
    $pass1 = $_POST['txPASS1'];
    $pass2 = $_POST['txPASS2'];
    if($pass1 == $pass2){
        $nim = $_POST['txNIM'];
        $nama = $_POST['txNAMA'];
        $alamat = $_POST['txALAMAT'];
        $tgl = $_POST['txTGL'];
        $jns = $_POST['txJNS'];
        $email = $_POST['txEMAIL'];   

        $sql = "INSERT INTO tbmahasiswa (nim,nama,alamat,tanggal_lahir,jenis_kelamin,email,passkey,iduser) VALUES ('$nim','$nama','$alamat','$tgl','$jns','$email','".md5($pass1)."','".md5($nama)."')";
        $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die("Gagal koneksi ke database"); 
        $hasil = mysqli_query($cnn,$sql);
        if($hasil){
            $psn = "Tambah User Sukses,Silahkan kembali ke dashboard";
            header('location:mahasiswa.php');
        }else{
            $psn = "Tamvah Gagal,Silahkan diulang";
        }

    }else{
        $psn = "Password tidak sama dengan konfirmasi password";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<?php
if(!$psn == ""){
echo "<div>".$psn."</div>";
}
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-danger">
            <h3 class="text-light p-3"><b>Sistem Informasi Akademika</b></h3>
        </div>

        <div class="col-3" style="background-color:#DBDFEA; padding-bottom:38%;">
            <ul class="list-group">
                <li class="list-group-item text-warning mt-2 mb-2"><a href="#" style="text-decoration:none;color:orange;">Dashboard</a></li>
                <li class="list-group-item text-warning mb-2"><a href="#" style="text-decoration:none;color:orange;">Mahasiswa</a></li>
                <li class="list-group-item text-warning"><a href="logout.php" style="text-decoration:none;color:orange;">Logout</a></li>
            </ul>
        </div>
            
        <div class="col-9">
            <div class="row">
                <div class="col-12 p-3 border-bottom border-3">
                    <h1>Input Data Mahasiswa</h1>
                </div>
                <div class="col-12">
                <form method="post" action="">
                    <div>
                        <label class="form-label"><b>NIM</b></label>
                            <input class="form-control" type="text" name="txNIM">
                    </div>

                    <div>
                        <label class="form-label"><b>Nama</b></label>
                            <input class="form-control"  type="text" name="txNAMA">
                    </div>

                    <div>
                        <label class="form-label"><b>Alamat</b></label>
                            <input class="form-control"  type="text" name="txALAMAT">
                    </div>  

                    <div>
                        <label class="form-label"><b>Tanggal Lahir</b></label>
                            <input class="form-control"  type="DATE" name="txTGL">
                    </div>

                    <div class="border border-2 mt-2">
                        <label class="form-label "><b>Jenis Kelamin</b></label><br>
                            <input type="radio" id="txJNS" name="txJNS" value="laki">
                                <label class="form-label">Laki-Laki</label>
                            <input type="radio" id="txJNS" name="txJNS" value="perempuan">
                                <label class="form-label">Perempuan</label>
                    </div>

                    <div>
                        <label class="form-label"><b>Email</b></label>
                            <input class="form-control"  type="email" name="txEMAIL">
                    </div>

                    <div>
                    <label class="form-label"><b>Password</b></label>
                        <input class="form-control"  type="password" name="txPASS1">
                    </div>

                    <div>
                        <label class="form-label"><b>Konfirmasi Password</b></label>
                            <input class="form-control"  type="password" name="txPASS2">
                    </div>

                    <div>
                        <button class="btn btn-danger text-light mt-3" type="submit" name="txREGISTER" id="register"><b>Tambah</b></button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>