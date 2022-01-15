<?php 

//require 'koneksidb.php';


//koneksi ke database menggunakan 3 cara
//MySQL
//MySQLi
//PDO (PHP Data Objek)

$conn = mysqli_connect("localhost","root","","phpdasar");

//var_dump($conn);
//echo "<br>";
//cek koneksi database
// if (!$conn){
//     die('Koneksi Error' .mysqli_connect_error());
// }else{
//     echo "Koneksi Berhasil";
// }

//Ambil data dari tabel mahasiswa / query data mahasiswa

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

//Ambil data mahasiswa (fetch) dari objek result
//mysqli_fetch_row() //Mengembalikan array numerik
//mysqli_fetch_assoc() //Mengembalikan array associative
//mysqli_fetch_array() //Mengembalikan keduanya
//mysqli_fetch_object() //Mengembalikan objek

// while ($mhs = mysqli_fetch_assoc($result)){

//     var_dump($mhs);
// }


//var_dump($mhs->nama);
//cara menampilkan data email dari objek 
//echo $mhs ->email;
//cara menampilkan dara email dari array numerik
//echo $mhs[3];
//cara menampilkan data email dari array associative
//echo $mhs["email"];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MysQLdanPHP</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding = "10" cellspacing = "0">
        
        <tr>
            <th>
                <p>Id</p>
            </th>
            <th>
                <p>Aksi</p>
            </th>
            <th>
                <p>Gambar</p>
            </th>
            <th>
                <p>Nama</p>
            </th>
            <th>
                <p>Email</p>
            </th>
            <th>
                <p>NIK</p>
            </th>
            <th>
                <p>Jurusan</p>
            </th>
           
        </tr>

        <?php 
        $i=1;
        while($mhs = mysqli_fetch_assoc($result)) : ?>

        
        <tr>
            <td><?php echo $i; ?></td>
            <td><a href="">Edit | Delete</a></td>
            <td><img src="img/<?php echo $mhs["gambar"]; ?>" alt=""></td>
            <td><?php echo $mhs["nama"]; ?></td>
            <td><?php echo $mhs["email"]; ?></td>
            <td><?php echo $mhs["nik"]; ?></td>
            <td><?php echo $mhs["jurusan"]; ?></td>
        </tr>
        
        <?php $i++; endwhile; ?>

    </table>


    
</body>
</html>