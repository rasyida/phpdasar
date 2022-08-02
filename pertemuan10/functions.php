<?php
//koneksi ke database
$db = mysqli_connect("localhost","root","","perpustakaan");


function query($query){
    global $db;
    $result = mysqli_query( $db, $query );
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;

    }
    return $rows;
}


function tambah ($data){
    global $db;

    $kode = htmlspecialchars( $data["kode"]);
    $nama =htmlspecialchars ($data["nama"]);
    $jk = htmlspecialchars ($data["jk"]);
    $jurusan = htmlspecialchars ($data ["jurusan"]);
    $tlp = htmlspecialchars( $data["notlp"]);
    $alamat = htmlspecialchars ( $dat["alamat"]);
    $photo =  htmlspecialchars ($data["photo"]);

    $query = "INSERT INTO tbl_anggota
                    VALUES
                ('','$kode','$nama','$jk','$jurusan','$tlp',
                '$alamat','$photo')
                ";
     mysqli_query($db, $query)  ;

     return mysqli_affected_rows($db);


}

function hapus($id){
global $db;
mysqli_query($db,"DELETE FROM tbl_anggota WHERE id_anggota=$id");

return mysqli_affected_rows($db);

}
