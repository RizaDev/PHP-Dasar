<?php 

require "koneksidb.php";

//cek apakah tombol daftar sudah ditekan
if (isset($_POST["submit"])){
    //jika sudah ditekan maka jalankan fungsi daftar
    if (daftar($_POST)){
        //jika data berhasil ditambahkan ke database 
        //maka tampilkan pesan 
        //dan redirect ke halaman Login
        echo 
        "
        <script>
        alert('Anda Berhasil Terdaftar!');
        document.location.href = 'login.php';
        </script>
        ";
    }else{
        //jika data gagal ditambahkan ke database
        //maka tampilkan pesan gagal dan info eror koneksi ke database
        //echo "Data Gagal terdaftar, ada kesalahan pada koneksi database";
        //echo "<br>";
        echo mysqli_error($conn);
        //exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>
   
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" id="username" name="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" id="password" name="password">       
            </li>
            <li>
                <label for="password1">Konfirmasi Password : </label>
                <input type="password" id="password1" name="password1">       
            </li>
            <li>
                <button type="submit" name="submit">Daftar!</button>
            </li>
        </ul>
    </form>
</body>
</html>