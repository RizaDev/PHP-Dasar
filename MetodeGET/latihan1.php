<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <!-- Metode Request GET
    Cara Kerja nya adalah Kirim data Melalui URL
    Lalu Data tsb ditangkap oleh $_GET -->
    <?php 
        $mahasiswa = [
            [
                "nama" =>"Riza",
                "nik" =>"221547",
                "jurusan" =>"Teknik Elektro", 
                "email" =>"rifa71426@gmail.com",
                "gambar" => "1.jpg"],
            [
                "nama" =>"Alvin",
                "nik" =>"221549",
                "jurusan" =>"Teknik Informatika", 
                "email" =>"AL@gmail.com",
                "gambar" => "ok.jpg"]
        ];
    ?>

    <h2>Daftar Mahasiswa</h2>
    <ul>
    
    <?php foreach ($mahasiswa as $mhs) : ?>
        <!-- <ul>
            <li><img src="img/<?php //echo $mhs["gambar"] ?>" alt=""></li>
            <li><?php //echo $mhs["nama"] ?></li>
            <li><?php //echo $mhs["nik"] ?></li>
            <li><?php //echo $mhs["jurusan"] ?></li>
            <li><?php //echo $mhs["email"] ?></li>
        </ul> -->

        <li> 
            <a 
            href="latihan2.php?nama=<?php echo $mhs["nama"]?>&gambar=<?php echo $mhs["gambar"]?>&nik=<?php echo $mhs["nik"]?>&jurusan=<?php echo $mhs["jurusan"]?>&email=<?php echo $mhs["email"]?>"><?php echo $mhs["nama"]; ?>
            </a>
        </li>
    <?php endforeach; ?>

    </ul>
</body>
</html>