<?php 
//mulai jalankan session
session_start();
//kalau belum ada session login 
if (!isset($_SESSION["login"])){
    //kembalikan ke halaman login
    header('Location: login.php');
    
}
require 'koneksidb.php';
//cek apakah variabel id sudah pernah dibuat atau belum
//kalau belum kembalikan ke halaman utama
if (isset($_POST["id"])){
    //kalau berhasil maka gunakan key id untuk menghapus data 
    hapus($_POST["id"]);
    //Kembali ke halaman utama
    echo "<script> document.location.href = 'index.php';</script>";

}else {
    //redirect ke halaman utama
    echo "<script> document.location.href = 'index.php';</script>";
}

?>