<?php
require 'functions.php';

//ambil data di url
$id = $_GET["id"];
// query data anggota berdasarkan id
$anggota = query ("SELECT * FROM tbl_anggota WHERE
                  id=$id")[0];



if (isset($_POST["submit"]) ){
    
        if ( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href='index.php';
                </script>
            ";
                    }else{
            echo "
                <script>
                    alert('data gagal diubah!');
                     document.location.href='index.php';
                        </script>
            ";
               
    
                    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $anggota["id"]; ?>">
        <ul>
            
            <li> 
                <label for="nama">Nama Anggota</label>
                <input type="text" name="nama" id="nama" required value="<?= $anggota["nama"]; ?>">
            </li>
            <li> 
                <label for="jk">Jk Anggota</label>
                <input type="text" name="jk" id="jk" value="<?= $anggota["jk"]; ?>" >
            </li>
            <li> 
                <label for="jurusan">Jurusan Anggota</label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $anggota["jurusan"]; ?>">
            </li>
            <li> 
                <label for="notlp">No Tlp Anggota</label>
                <input type="text" name="notlp" id="alamat" value="<?= $anggota["notlp"]; ?>">
            </li>
            <li> 
                <label for="alamat">Alamat Anggota</label>
                <input type="text" name="alamat" id="alamat" value="<?= $anggota["alamat"]; ?>">
            </li>
            <li> 
                <label for="photo">Photo</label>
                <input type="text" name="photo" id="photo" value="<?= $anggota["photo"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>


        </ul>

    </form>
</body>
</html>