<?php 
//Untuk Mengamankan Latihan 2 maka wajib di cek 
//apakah variabel yang harusnya terkirim melalui URL 
//Pernah dibuat atau belum
//kalau belum pernah dibaut paksa kembali ke halaman Latihan1
if (
    !isset($_GET["nama"]) ||
    !isset($_GET["nik"]) ||
    !isset($_GET["jurusan"]) ||
    !isset($_GET["email"]) ||
    !isset($_GET["gambar"]) 
    ){

    //redirect
    header("Location: latihan1.php");

    exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NangkapDatadgGET</title>
</head>
<body>
    <ul>

        <li><img src="img/<?php echo $_GET["gambar"] ?>" alt=""></li>
        <li><?php echo $_GET["nama"] ?></li>
        <li><?php echo $_GET["nik"] ?></li>
        <li><?php echo $_GET["email"] ?></li>
        <li><?php echo $_GET["jurusan"] ?></li>
    </ul>

    <h1><a href="latihan1.php">Kembali Ke Latihan 1</a></h1>
</body>
</html>