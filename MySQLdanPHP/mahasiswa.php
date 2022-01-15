<?php 
//untuk simulasi loader
//sleep 1 detik sebelum menampilkan hasil query
sleep(1);

require 'koneksidb.php';

// OR
//         nik LIKE %$keyword% OR
//         jurusan LIKE %$keyword% OR
//         email LIKE %$keyword%
$keyword = $_GET['keyword'];

$query = "SELECT * FROM mahasiswa 
        WHERE 
        nama LIKE '%$keyword%' OR
        nik LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'";
$mahasiswa = antrian($query);



?>

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