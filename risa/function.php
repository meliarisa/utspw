<?php
include "konfigurasi.php";

function query($query){
    $con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die ("Gagal Koneksi Database");
    $result = mysqli_query($con,$query);
    if($result == true){
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
        return $rows;
    }
}

?>