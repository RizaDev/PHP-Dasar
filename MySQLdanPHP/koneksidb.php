<?php 
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    // $result = mysqli_query($conn,"SELECT * FROM mahasiswa");
    // $temp = [];
    //var_dump($temp);
    //$hasil = mysqli_fetch_assoc($result);

    //echo var_dump($hasil);

    // while($hasil = mysqli_fetch_assoc($result)){
    //     $temp[] = $hasil;
    // }

    // var_dump($temp);

    function antrian($antrian){
        global $conn;
        $result = mysqli_query($conn,$antrian);
        $temp = [];
        while($hasil = mysqli_fetch_assoc($result)){
            $temp[] = $hasil;
        }
        return $temp;
        
    }

    //fungsi untuk mencari data dan menampilkan ke layar
    // = data sama persis dengan $key
    //LIKE $key% mencari data yang depan nya sama dengan $key
    //LIKE %$key% mencari data asalkan ada yang sama tampilkan
     
    //Function menambahkan data ke tabel mahasiswa pada database phpdasar

    function tambah($data){
        //koniksi ke database phpdasar
        global $conn;
        //simpan data yang dikirim melalui post ke variabel
        $gambar = upload();
        $nama = $data["nama"];
        $email = $data["email"];
        $nik = $data["nik"];
        $jurusan = $data["jurusan"];
        //Metode menambahkan data ke tabel mahasiswa di database phpdasar
        $query = "INSERT INTO mahasiswa
        VALUES
        ('','$nik','$nama','$email','$jurusan','$gambar')
        ";
        //metode merealisasikan penambahan data ke tabel menggunakan query
        //kemudian kembalikan hasil notifikasi dari fungsi mysqli_query
        return mysqli_query($conn,$query);
        
    }

    function daftar($data){
        global $conn;

        //simpan data yg dimasukan user
        $username = $data["username"];
        $pass = $data["password"];
        $pass1 = $data["password1"];
    
        //document.location.href = 'registrasi.php';
        //cek username sudah ada atau belum
        $hasil = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($hasil)){
            echo 
                "
                <script>
                alert('Username sudah ada!');
                
                </script>
                ";
            return false;
        }
        //cek apakah password konfimasi yang dimasukan sudah benar
        if ($pass === $pass1){
            //enkripsi password
            $enPass = password_hash($pass, PASSWORD_DEFAULT);
            $query = "INSERT INTO user VALUES ('','$username', '$enPass')";
            
        }else{
            echo 
                "
                <script>
                alert('Password yang anda masukkan tidak sama!');
                
                </script>
                ";
                return false;
        }

        return mysqli_query($conn,$query);
    }

    function upload(){
    //jalakan fungsi tambah data gambar
    //jika beberapa syarat berikut terpenuhi
    $namaFile = $_FILES["gambar"]["name"];
    $tmpName = $_FILES["gambar"]["tmp_name"];
    $sizeFile = $_FILES["gambar"]["size"];
    //filter file yang diupload harus berektensi file seperti jpg,jpeg,png,gif
    $typeFileLolosUpdate = array("jpg","jpeg","png","gif");
    //ambil ekstensi file yang diupload
    //fungsi pathinfo() mengembalikan array associative
    //strtolower menjadikan karakter menjadi huruf kecil
    $pathInfo = pathinfo($namaFile);
    $ekstensiFile = strtolower($pathInfo["extension"]);
     
    //Buat nama file unique dengan fungsi uniqid()
    $namaBaru = uniqid();
    $namaFileBaru = "$namaBaru.$ekstensiFile";

        // File yang diuplaod harus sesuai ekstensi dan ukuran file <= 2MB 
        if (in_array($ekstensiFile,$typeFileLolosUpdate) && $sizeFile <=2000000){
                
        //Pindahkan file ke folder img
            move_uploaded_file($tmpName, "img/". $namaFileBaru);
                
                

                


        }else{
            echo "File yang anda upload harus berekstensi jpg,jpeg,png dan Ukurannya < 1MB";
            die;
                
        }
    return $namaFileBaru;
    }

    function hapus($datahapus){
        global $conn;
        //metode hapus data dari tabel mahasiswa
        $query = "DELETE FROM mahasiswa WHERE id = $datahapus";
        //Metode merealisasikan hapus data
        mysqli_query($conn,$query);
    }

    function edit($ubah){
        //koniksi ke database phpdasar
        global $conn;
        //simpan data yang dikirim melalui post ke variabel
        $id = $ubah["id"];
        
        //var_dump($_FILES["gambar"]["error"]);
        //cek apakah upload gambar atau tidak
        //jika $_FILES["gambar"]["error"] mengembalikan nil int = 4 
        //maka user tidak mengupload gambar
        if ($_FILES["gambar"]["error"] <= 0){
            $gambar = upload();
        }else{
            $gambar = $_POST["gambar"];
        }
        
        //var_dump($gambar);
        //var_dump($_POST["gambar"]);
        $nama = $ubah["nama"];
        $email = $ubah["email"];
        $nik = $ubah["nik"];
        $jurusan = $ubah["jurusan"];
        //Metode mengubah data ke tabel mahasiswa di database phpdasar
        $query = "UPDATE mahasiswa SET
                gambar = '$gambar',
                nama = '$nama',
                email = '$email',
                nik = '$nik',
                jurusan ='$jurusan'
                WHERE id = $id     
            ";
        
        //metode merealisasikan pengubahan data ke tabel menggunakan query
        //kemudian kembalikan hasil notifikasi dari fungsi mysqli_query
        return mysqli_query($conn,$query);

    }

    function hasilcari($key){
        global $conn;
        //jika sudah ditekan maka hapus isi tabel
        $query1 = "DELETE FROM cari";
        //eksekusi hapus
        mysqli_query($conn,$query1);
    
        //lakukan pencarian data
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$key%' ";
        $result = mysqli_query($conn, $query);
       
        $temp1 = [];

        while($has = mysqli_fetch_assoc($result)){
            $temp1[] = $has;
            
        }

        //simpan data pencarian dalam tabel cari di database phpdasar
        foreach( $temp1 as $in){
            $id = $in["id"];
            $nama = $in["nama"];
            $email = $in["email"];
            $nik = $in["nik"];
            $jurusan = $in["jurusan"];
            $gambar = $in["gambar"];
            $query = "INSERT INTO cari
            VALUES
            ($id,'$nik','$nama','$email','$jurusan','$gambar')
            ";
            //metode merealisasikan penambahan data ke tabel menggunakan query
            //kemudian kembalikan hasil notifikasi dari fungsi mysqli_query
            mysqli_query($conn,$query);
        }

        
   
    }

?>