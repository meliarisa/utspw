<?php
include "function.php";
session_start();
if($_SESSION['login'] == false){
    header('Location:login.php');
}
    $query = query("SELECT * FROM tbmahasiswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                <li class="list-group-item text-warning mt-2 mb-2"><a href="dashboard.php" style="text-decoration:none;color:orange;">Dashboard</a></li>
                <li class="list-group-item text-warning mb-2"><a href="mahasiswa.php" style="text-decoration:none;color:orange;">Mahasiswa</a></li>
                <li class="list-group-item text-warning"><a href="logout.php" style="text-decoration:none;color:orange;">Logout</a></li>
            </ul>
        </div>
            
        <div class="col-9">
            <div class="row">
                <div class="col-12 p-3 border-bottom border-3">
                    <h1>Data Mahasiswa</h1>
                </div>

                <div class="col-12 mt-3">
                    <div class="text-center border rounded text-light p-2" style="background-color:#DBDFEA;">
                        <div class="d-flex justify-content-start">
                            <a href="tambah.php" class="btn btn-warning text-light">Input Mahasiswa</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                <?php $id = 1; ?>
                <?php foreach ($query as $row) : ?>
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><?= $id; ?></th>
                                    <td><?= $row['nim'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td><?= $row['tanggal_lahir'] ?></td>
                                    <td><?= $row['jenis_kelamin'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td>
                                        <a class="p-1 border rounded" href="delete.php?id=<?=$row['id'];?>"style="text-decoration:none;color:white; background-color:red;">Delete</a>||
                                        <a class="p-1 border rounded" href="update.php?id=<?=$row['id'];?>"style="text-decoration:none;color:white; background-color:green;">Update</a>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                    <?php $id++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>














<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>