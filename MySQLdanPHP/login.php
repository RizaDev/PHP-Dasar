<?php 
//mulai jalankan session
session_start();
require 'koneksidb.php';

//cek jika masih ada cookie maka masuk ke index.php
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id = $_COOKIE['id'];
    $cekNama = $_COOKIE["key"];
    //ambil nama yang ada di tabel user sesuai id dari cookie
    $result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
    $hasilNama = mysqli_fetch_assoc($result);
    if ($cekNama === hash('sha256',$hasilNama["username"])){
        $_SESSION["login"] = 1;
    }

}
//jika session nya masih ada maka
//kembalikan ke halaman index.php
if(isset($_SESSION["login"])){
    header('Location: index.php');
}


//cek apakah tombol login sudah ditekan
if (isset($_POST["submit"])){
    $nama = $_POST["username"];
    $pass = $_POST["pass"];


    //cek apakah username ada di tabel user
    $hasil = mysqli_query($conn, "SELECT * FROM user WHERE username = '$nama'");
    //$h = mysqli_num_rows($hasil); mengembalikan 1 jika username ada ditabel user
    //$h1 = mysqli_fetch_assoc($hasil); mengembalikan 1 array assosiative sesuai $nama 
    //jika username ada di tabel
    if (mysqli_num_rows($hasil) === 1){
        //maka cek pass yang dimasukkan user
        $cekPass = mysqli_fetch_assoc($hasil);
        if (password_verify($pass, $cekPass["password"])){
            //set session
            $_SESSION["login"] = 1;
            //set cokie jika ceklist remember me
            if(isset($_POST["remember"])){
                setcookie('id', $cekPass["id"], time()+60);
                setcookie('key', hash('sha256', $cekPass["username"]),time()+60);
            }
            
            //jika password sesuai maka masuk ke index.php
            header('Location: index.php');
        }
        
    } 
    $err = 1;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if(isset($err)) : ?>
    <p style="color: red; font-style: italic;">password/username salah</p>
    <?php endif; ?>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" id="username" name="username">
            </li>
            <li>
                <label for="pass">Password :</label>
                <input type="password" id="pass" name="pass">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </li>
            <li>
                <button type="submit" name="submit">Login!</button>
            </li>
        </ul>
    </form>
</body>
</html>