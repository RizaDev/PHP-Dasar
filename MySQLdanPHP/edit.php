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
// var_dump($_FILES["gambar"]);
// var_dump($_POST);
// var_dump($_POST["gambar"]);
if (isset($_POST["submit"])){
    if (edit($_POST) == true){
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    }else {
        echo "Data Gagal diubah!";
        echo "<br>";
        echo mysqli_error($conn);
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
            <input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>">
            <input type="hidden" name="gambar" value="<?php echo $_POST["gambar"]; ?>">
            <li><label for="gambar">Gambar : </label><img src="img/<?php echo $_POST["gambar"]; ?>" alt=""></li>
            <li> <input type="file" name="gambar" id="gambar" ></li><br>
            <li><label for="nama">Nama : <input type="text" name="nama" id="nama" value="<?php echo $_POST["nama"]; ?>" required></label></li><br>
            <li><label for="email">Email : <input type="text" name="email" id="email" value="<?php echo $_POST["email"]; ?>" required></label></li><br>
            <li><label for="nik">NIK : <input type="text" name="nik" id="nik" value="<?php echo $_POST["nik"]; ?>" required></label></li><br>
            <li><label for="jurusan">Jurusan : <input type="text" name="jurusan" id="jurusan" value="<?php echo $_POST["jurusan"]; ?>" required></label></li><br>
            <li><button type="submit" name="submit">Sumbit!</button></li>
        </ul>
    </form>
</body>
</html>