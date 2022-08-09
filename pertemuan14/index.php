<?php
require 'functions.php';
$result = query("SELECT * FROM tbl_anggota ");
//jika nanti tomblo cari di klik
if(isset($_POST["cari"])){
    $result=cari($_POST["serch"]);
}
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

    <a href="tambah.php">Tambah Data </a>
    <br>
        
    <br>
        <form action="" method="POST">
            <input type="text" name="serch" size="20" autofocus
            placeholder="Masukan Keyword Pencarian" autocomplete="off">
            <button type="submit" name="cari">Cari</button>
        </form>


    <br>

        <table border="1" cellpading="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Id Anggota</th>
                
                <th>Nama Anggota</th>
                <th>Jenis Kelamin Anggota</th>
                <th>Jurusan Anggota</th>
                <th>No Tlp Anggota</th>
                <th>Alamat Anggota</th>
                <th>Photo Anggota</th>

            </tr>

            <?php $i=1; ?>
            <?php foreach ( $result as $row)  :?>

            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah.php?id=<?=$row["id"];  ?>">Ubah</a> | 
                    <a href="hapus.php?id=<?= $row["id"]; ?>"
                         onclick="return confirm('yakin??');"> Hapus </a>
                </td>
                <td><?= $row["id"];?></td>
                <td><?= $row["nama"];?> </td>
                <td><?= $row["jk"];?></td>
                <td><?= $row["jurusan"];?></td>
                <td><?= $row["notlp"];?></td>
                <td><?= $row["alamat"];?></td>
                <td><img src="img/<?= $row["photo"];?>" width="100" alt=""></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>


        </table>




</body>
</html>