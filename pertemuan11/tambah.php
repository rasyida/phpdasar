<?php
require 'functions.php';

if (isset($_POST["submit"]) ){

    
        if ( tambah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href='index.php';
                </script>
            ";
                    }else{
            echo "
                <script>
                    alert('data gagal ditambahkan');
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
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            
            <li> 
                <label for="nama">Nama Anggota</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li> 
                <label for="jk">Jk Anggota</label>
                <input type="text" name="jk" id="jk">
            </li>
            <li> 
                <label for="jurusan">Jurusan Anggota</label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li> 
                <label for="notlp">No Tlp Anggota</label>
                <input type="text" name="notlp" id="alamat">
            </li>
            <li> 
                <label for="alamat">Alamat Anggota</label>
                <input type="text" name="alamat" id="alamat">
            </li>
            <li> 
                <label for="photo">Photo</label>

                <input type="file" name="photo" id="photo">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>


        </ul>

    </form>
</body>
</html>