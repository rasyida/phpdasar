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

    $nama =htmlspecialchars ($data["nama"]);
    $jk = htmlspecialchars ($data["jk"]);
    $jurusan = htmlspecialchars ($data ["jurusan"]);
    $notlp = htmlspecialchars( $data["notlp"]);
    $alamat = htmlspecialchars ( $data["alamat"]);

    //upload gambar
    $photo = upload();
    if (!$photo){
        return false;
    }

    $query = "INSERT INTO tbl_anggota
                    VALUES
                ('','$nama','$jk','$jurusan','$notlp',
                '$alamat','$photo')
                ";
     mysqli_query($db, $query)  ;

     return mysqli_affected_rows($db);


}

function upload(){
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'] ;

    //cek apakah tidak ada gamabar yang diupload
    if($error == 4){
        echo "<script>
                    alert('Silahkan Masukan Photo !!');
               </script> ";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end ($ekstensiGambar));  
    if( !in_array ($ekstensiGambar,$ekstensiGambarValid) ){
        echo "<script>
                    alert('Yang Anda Upload Bukan Photo / Gambar  !!');
               </script> ";
        return false;
    }

    //cek ukran
    if($ukuranFile > 5000000){
        echo "<script>
        alert('Ukuran Gambar Terlalu Besar');
   </script> ";
return false;
    }
    // gambar di upload

    //generate nama gamabr baru
    $namaFileBaru= uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName,'img/'.$namaFileBaru);
    return $namaFileBaru;
    

}

function hapus($id){
global $db;
mysqli_query($db,"DELETE FROM tbl_anggota WHERE id=$id");
return mysqli_affected_rows($db);

}



function ubah($data){
    global $db;

    $id=  $data["id"];
    $nama =htmlspecialchars ($data["nama"]);
    $jk = htmlspecialchars ($data["jk"]);
    $jurusan = htmlspecialchars ($data ["jurusan"]);
    $notlp = htmlspecialchars( $data["notlp"]);
    $alamat = htmlspecialchars ( $data["alamat"]);
    $photo =  htmlspecialchars ($data["photo"]);

    $query = "UPDATE tbl_anggota SET 
                nama ='$nama',
                jk = '$jk',
                jurusan ='$jurusan',
                notlp= '$notlp',
                alamat = '$alamat',
                photo ='$photo'

            WHERE id = $id

                ";
              
     mysqli_query($db, $query)  ;

     return mysqli_affected_rows($db);

}

function cari($serch){
    $query="SELECT * FROM tbl_Anggota 
                WHERE
            id LIKE'%$serch%'OR
            nama LIKE'%$serch%'OR
            jurusan LIKE'%$serch%'

                ";
    return query($query);        
}

function registasi($data){
    global $db;
    $username=strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);


    //cek user name sudah ada / blm
    $result = mysqli_query($db,"SELECT username FROM users WHERE
                username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo"<script>
                alert('Username Yang di Pilih Sudah Ada !!!')
             </script>";

             return false;
    }
    
    
    //konfirmasi password
        if( $password !== $password2 ) {
            echo "<script>
                    alert('konfirmasi password tidak sesuai!');
                       </script>";

           return false;
        }
        //enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);
        //tambahkan user baru
        mysqli_query($db, "INSERT INTO users VALUES('','$username','$password')");
        return mysqli_affected_rows($db);
}