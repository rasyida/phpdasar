<?php
//koneksi ke database
$db = mysqli_connect("localhost","root","","perpustakaan");

//ambil data dati tabel anggota

$result = mysqli_query($db, "SELECT * FROM tbl_anggota");

// ambil data (fetch) anggota objek result
//mysqli_fetc_row // mengembalikan array numerik

//mysqli_fetch_assoc //mengembalikan array associative
/*while( $angg = mysqli_fetch_assoc($result) ){

}*/


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
            <?php while ( $row = mysqli_fetch_assoc($result) ) :?>

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
            <?php endwhile; ?>


        </table>




</body>
</html>