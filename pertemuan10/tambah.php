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
                    alert('data berhasil ditambahkan');
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

    <form action="" method="POST">
        <ul>
            <li> <label for="kode_anggota">Kode Anggota</label>
                <input type="text" name="kod" 
                id="kode" required>
            </li>
            <li> 
                <label for="nama_anggota">Nama Anggota</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li> 
                <label for="jk_anggota">Jk Anggota</label>
                <input type="text" name="jk" id="jk">
            </li>
            <li> 
                <label for="jurusan_anggota">Jurusan Anggota</label>
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
                <input type="text" name="photo" id="photo">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>


        </ul>

    </form>
</body>
</html>