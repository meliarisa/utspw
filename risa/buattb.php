<?php
    include("konfigurasi.php");

    $tbadmin = "tbadmin";
    $tbmahasiswa = "tbmahasiswa";
    $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die("Koneksi Gagal");

    $sql1 = "CREATE TABLE $tbadmin(
        id INT(6) UNSIGNED AUTO_INCREMENT,
        nama VARCHAR(50) NOT NULL,
        email VARCHAR(255) NOT NULL,
        username VARCHAR(20),
        passkey VARCHAR(255),
        iduser VARCHAR(255),        
        PRIMARY KEY(id)
    );";

$hasil1 = mysqli_query($cnn,$sql1);
if($hasil1 === true){
    echo "Tabel".$tbadmin."Berhasil Dibuat";
}else{
    echo "Tabel".$tbadmin."Gagal Dibuat";
}

    $sql2 = "CREATE TABLE $tbmahasiswa(
        id INT(6) UNSIGNED AUTO_INCREMENT,
        nim VARCHAR(50) NOT NULL,
        nama VARCHAR(255) NOT NULL,
        alamat VARCHAR(225),
        tanggal_lahir VARCHAR(225),
        jenis_kelamin VARCHAR(225),
        email VARCHAR(255),
        passkey VARCHAR(255),  
        iduser VARCHAR(225),      
        PRIMARY KEY(id)
    );";

$hasil2 = mysqli_query($cnn,$sql2);
if($hasil2 === true){
    echo "Tabel".$tbmahasiswa."Berhasil Dibuat";
}else{
    echo "Tabel".$tbmahasiswa."Gagal Dibuat";
}

?>