<?php
include "function.php";

$id = $_GET['id'];

$con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die ("Gagal Koneksi Database");
$query = "DELETE FROM tbmahasiswa WHERE id = '$id'";
$result = mysqli_query($con,$query);
if($result == true){
    echo"<script> alert('berhasil terhapus') </script>";
    header("location:mahasiswa.php");
}else{
    echo"<script> alert('gagal terhapus') </script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data good bye</title>
</head>
<body>
    
</body>
</html>