<?php 
//mulai jalankan session
session_start();
//kalau belum ada session login 
if (!isset($_SESSION["login"])){
    //kembalikan ke halaman login
    header('Location: login.php');
    
}

require 'koneksidb.php';
$jmlDataPerHal1 = 2;
$halAktif = (isset($_GET["page"]))?$_GET["page"] : 1;
$awalData1 = $jmlDataPerHal1*$halAktif - $jmlDataPerHal1;
     
//cek apakah tombol cari di halaman index.php sudah ditekan atau belum
//kalau sudah ditekan maka
if(isset($_POST["cari"])){
    hasilcari($_POST["keyword"]);
    
}

//cek apakah tombol cari halaman ini sudah ditekan
if(isset($_POST["cari1"])){
    hasilcari($_POST["keyword1"]);

}
$jmlData = count(antrian("SELECT * FROM cari"));
$jmlHal = ceil($jmlData/$jmlDataPerHal1);

//tampilkan data pencarian
$mahasiswa = antrian("SELECT * FROM cari LIMIT $awalData1, $jmlDataPerHal1");








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MysQLdanPHP</title>
    <style>
        form {
                display: inline-block;  
            }
    </style>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>
    <!-- Tombol untuk ke halaman tambahkan data mahasiswa -->
    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>
    <!-- Menu untuk mencari data -->
    <form action="" method="POST">
        <input type="text" name="keyword1" autofocus placeholder="masukkan kata kunci">
        <button type="submit" name="cari1">Cari!</button>
    </form>
    <br><br>
    <!-- Navigasi halamana -->
    <?php if($halAktif != 1) : ?>
        <a href="?page=<?php echo $halAktif - 1 ?>">&laquo</a>
    <?php endif; ?>
    
    <?php for($i=1;$i <= $jmlHal;$i++) : ?>
            <?php if( $i == $halAktif) : ?>
                <a href="?page=<?php echo $i ?>" style="font-weight: bold; color:red;"><?php echo $i ?></a>
            <?php else : ?>
                <a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
            <?php endif; ?>

    <?php endfor; ?>
    <?php if($halAktif != $jmlHal) : ?>
        <a href="?page=<?php echo $halAktif + 1 ?>">&raquo</a>
    <?php endif; ?>
    
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
        foreach ($mahasiswa as $mhs) : ?>

        
        <tr>
            <td><?php echo $i; ?></td>
            <!-- Edit atau Delete -->
            <td>
             <form action="../MySQLdanPHP/edit.php" method="POST">
                 <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
                 <input type="hidden" name="gambar" value="<?php echo $mhs["gambar"]; ?>">
                 <input type="hidden" name="nama" value="<?php echo $mhs["nama"]; ?>">
                 <input type="hidden" name="email" value="<?php echo $mhs["email"]; ?>">
                 <input type="hidden" name="nik" value="<?php echo $mhs["nik"]; ?>">
                 <input type="hidden" name="jurusan" value="<?php echo $mhs["jurusan"]; ?>">
                 <button type="submit" >Edit </button>
             </form>
             &nbsp;|&nbsp;
             <form action="../MySQLdanPHP/delete.php" method="POST">
                 <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
                 <button type="submit" onclick="return confirm('Yakin mau hapus?')">Delete </button>
             </form>
            </td>
            <!-- Tampilkan data dari tabel mahasiswa -->
            <td><img src="img/<?php echo $mhs["gambar"]; ?>" alt=""></td>
            <td><?php echo $mhs["nama"]; ?></td>
            <td><?php echo $mhs["email"]; ?></td>
            <td><?php echo $mhs["nik"]; ?></td>
            <td><?php echo $mhs["jurusan"]; ?></td>
        </tr>
        
        <?php $i++; endforeach; ?>

    </table>
</body>
</html>