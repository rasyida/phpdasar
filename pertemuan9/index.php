<?php
require 'functions.php';
$perpus = query("SELECT * FROM tbl_anggota");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halamn Admin</title>
</head>
<body>
    <h1>Daftar Perpustakaan</h1>
        <table border="1" cellpading="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Id Anggota</th>
                <th>Kode Anggota</th>
                <th>Nama Anggota</th>
                <th>Jenis Kelamin Anggota</th>
                <th>Jurusan Anggota</th>
                <th>No Tlp Anggota</th>
                <th>Alamat Anggota</th>
                <th>Photo Anggota</th>

            </tr>

            <?php $i=1; ?>
            <?php foreach ( $perpus as $row)  :?>

            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="">Ubah</a> | 
                    <a href="">Hapus</a>
                </td>
                <td><?= $row["id_anggota"];?></td>
                <td><?= $row["kode_anggota"];?></td>
                <td><?= $row["nama_anggota"];?> </td>
                <td><?= $row["jk_anggota"];?></td>
                <td><?= $row["jurusan_anggota"];?></td>
                <td><?= $row["no_tlp_anggota"];?></td>
                <td><?= $row["alamat_anggota"];?></td>
                <td><img src="img/<?= $row["photo"];?>" width="100" alt=""></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>


        </table>




</body>
</html>