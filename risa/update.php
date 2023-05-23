<?php
include"function.php";
$id = $_GET['id'];

if(isset($_POST['txUPDATE'])){
    $con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die ("Gagal Koneksi Database");
    $iduser = $_POST['txID'];
    $nim = $_POST['txNIM'];
    $nama = $_POST['txNAMA'];
    $alamat = $_POST['txALAMAT'];
    $tgl = $_POST['txTGL'];
    $jns = $_POST['txJNS'];
    $email = $_POST['txEMAIL'];   
    $pass1 = $_POST['txPASS1'];
    $pass2 = $_POST['txPASS2'];
    if($pass1 == $pass2){
        $sql = "UPDATE tbmahasiswa SET nim = '$nim', nama = '$nama', alamat= '$alamat', tanggal_lahir = '$tgl', jenis_kelamin = '$jns', email= '$email', passkey = '".md5($pass1)."' WHERE id = $iduser";
        $result = mysqli_query($con,$sql);
        if($result == true){
            echo"<script>alert('Berhasil Terupdate');</script>";
            header('location:mahasiswa.php');
        }else{
            echo"<script>alert('Gagal Terupdate');</script>";
        }
    }else{
        echo"<script>alert('Passkey tidak sama');</script>";
    }

}

$query = query("SELECT * FROM tbmahasiswa WHERE id = '$id'");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>



<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-warning">
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
                    <?php foreach ($query as $row): ?>

                    <div>
                        <input type="hidden" name="txID" value="<?php echo $row['id']; ?>">
                    </div>

                    <div>
                        <label class="form-label"><b>NIM</b></label>
                            <input class="form-control" type="text" name="txNIM" placeholder="<?php echo $row['nim']; ?>">
                    </div>

                    <div>
                        <label class="form-label"><b>Nama</b></label>
                            <input class="form-control"  type="text" name="txNAMA" placeholder="<?php echo $row['nama']; ?>">
                    </div>

                    <div>
                        <label class="form-label"><b>Alamat</b></label>
                            <input class="form-control"  type="text" name="txALAMAT" placeholder="<?php echo $row['alamat']; ?>">
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
                            <input class="form-control"  type="email" name="txEMAIL" placeholder="<?php echo $row['email']; ?>">
                    </div>

                    <div>
                    <label class="form-label"><b>Password</b></label>
                        <input class="form-control"  type="password" name="txPASS1" placeholder="Password">
                    </div>

                    <div>
                        <label class="form-label"><b>Konfirmasi Password</b></label>
                            <input class="form-control" type="password" name="txPASS2" placeholder="Password">
                    </div>

                    <div>
                        <button class="btn btn-warning text-light mt-3" type="submit" name="txUPDATE" id="update"><b>Update</b></button>
                    </div>

                    <?php endforeach; ?>
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