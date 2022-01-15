<?php 

//mulai jalankan session
session_start();
//kalau belum ada session login 
if (!isset($_SESSION["login"])){
    //kembalikan ke halaman login
    header('Location: login.php');
    
}
require 'koneksidb.php';


//cek apakah tombol submit sudah ditekan
if (isset($_POST["sumbit"])){

    //cek apakah tambah data ke database berhasil dilakukan
    //sekaligus jalankan fungsi tambah
    if(tambah($_POST) == true){
        echo 
        "
        <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    
    }else {
        echo "Tambah Data Gagal";
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
    <h1>Tambahkan Data Mahasiswa</h1>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            
            <li><input type="file" name="gambar" required></li>
            <li><label for="nama">Nama : <input type="text" name="nama" id="nama" required></label></li>
            <li><label for="email">Email : <input type="text" name="email" id="email" required></label></li>
            <li><label for="nik">NIK : <input type="text" name="nik" id="nik" required></label></li>
            <li><label for="jurusan">Jurusan : <input type="text" name="jurusan" id="jurusan" required></label></li>
            <li><button type="submit" name="sumbit">Sumbit!</button></li>
        </ul>
    </form>
</body>
</html>