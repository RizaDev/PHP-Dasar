<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=L, initial-scale=1.0">
    <title>Latihan Pengualangan dan Pengkondisian</title>

    <style>
        #warnabiru {
            background-color: blue;
        }


        .kotak {
            width: 50px;
            height: 50px;
            background-color: blue;
            line-height: 50px;
            text-align: center;
            margin: 3px;
            float:right ;
            transition: 1s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }
        .clear {
            clear: right;
        }
    </style>
</head>
<body>
    <!-- <table border="1" cellspacing = "0" cellpadding ="10"> -->
        <!-- //pengulangan 
        //for
        //while
        //do..while
        //foreach untuk array -->
        <!-- <?php
         for ($i=1;$i<=5;$i++){
          echo "<tr>";
          for ($j=1; $j <= 5; $j++) { 
              echo "<td>$i,$j</td>";
          }
          echo "</tr>";
         }
        ?> -->

        <!-- <?php for ($i=1; $i <= 5 ; $i++) :?> 
            <tr>
                <?php
                for ($j=1; $j <= 5 ; $j++) : ?> 
                    <td><?= "$j,$j";
                    ?></td>
                <?php endfor;?>
            </tr>
        <?php endfor;?> -->

        <!-- //Pengkondisian 
        //if else
        //if elseif else
        //ternary
        //switch -->


        <!-- <?php for ($i=1; $i <= 5 ; $i++) :?> 
            <tr id="warnabiru">
                <?php
                for ($j=1; $j <= 5 ; $j++) : ?> 
                    <td><?= "$j,$j";
                    ?></td>
                <?php endfor;?>
            </tr>
        <?php endfor;?> -->

        <!-- <?php for ($i=1; $i <= 5 ; $i++) { ?> 
            <?php if ($i%2 == 1) {?>
                   <tr id="warnabiru">
                <?php for ($j=1;$j<=5;$j++) { ?>
                        <td><?php echo "$i,$j"; ?></td>
                <?php } ?>
                       
                   </tr>
            <?php } else { ?>
                <tr>
                <?php for ($j=1;$j<=5;$j++) { ?>
                        <td><?php echo "$i,$j"; ?></td>
                <?php } ?>
                </tr>
            <?php } ?>
        <?php } ?> -->


        <!-- <?php for ($i=1; $i <= 5 ; $i++) { ?> 
            <?php if ($i%2 == 0) {?>
                <tr id="warnabiru">
            <?php } else { ?>
                <tr>
            <?php } ?>
            <?php for ($j=1;$j<=5;$j++) { ?>
                    <td><?php echo "$i,$j"; ?></td>
                <?php } ?>
                </tr>
        <?php } ?> -->

   
    <!-- </table> -->
    <!-- Buit in Function
    Date / Time
    Date()
    time()
    mktime()
    strtotime()
     -->
    <!-- <?php 
     echo date("d M Y H:i:s ", time()+60*60*24*360*10) // 10 tahun ke depan
    ?> -->


    <!-- mktime
    Membuat detik sendiri
    mktime(0,0,0,0,0,0)
    jam,menit,sekon,bulan,tanggal,tahun -->

    <!-- <?php 
     echo date("d M Y", mktime(0,0,0,12,8,1994))
    ?> -->


    <!-- Menemukan hari saya dilahirkan menggunkan strtotime atau mktime -->

    <!-- <?php  
     echo date("l", strtotime("8 Dec 1994"))
    ?> -->

    <!-- String
    strlen()
    strcmp()
    explode
    htmlspecialchars() -->

    <!-- Function Buat Sendiri -->

    

    <?php 
      //  function salamkamu ($nama= "Alfin",$waktu="Sore"){
        //    return "Selamat $waktu, $nama";
        //}
    ?> 

    <!-- <h1><?php// echo salamkamu ("Riza","Pagi"); ?></h1>  -->
    <!-- Output : Selamat Pagi, Riza -->

    <!-- <?php 
        //function salam(){
          //  return "Hey";
        //}
    ?>

    <h1><?php //echo salam(); ?></h1> -->
    <!-- Output : Hey -->


    <!-- Variabel Scope -->
    <!-- <?php 
        //$x =10; //Var x adalah var lokal didalam php
        //kalau mau var x dapot diakses oleh function
        //maka gunakan key global $x didalam function

        
        //function tampil(){
            //global $x; agar Output 10
          //  return $x;
        //}

        //echo tampil(); // NO output karna var x dalam function adalah var lokal didalam function

    
    ?> -->


    <!-- Var SuperGlobal dalam PHP

    $_GET
    $_POST
    $_REQUEST
    $_SESSION
    $_COOKIE
    $_SERVER
    $_ENV

    Perlakukan var ini sebagai Array Associative-->


    <?php var_dump($_SERVER); ?>



   


    <!-- Pengulangan pada array -->

    <!-- <?php 
        $mahasiswa = [["Riza", "221547","Teknik Elektro", "rifa71426@gmail.com"],
        ["Alfin", "221546","Teknik Informatika", "al@gmail.com"]];
    ?>

    <h2>Daftar Mahasiswa</h2>
    
    
    <?php foreach ($mahasiswa as $isielemenarraymahasiswa) : ?>
        <ul>
            <li><?php echo $isielemenarraymahasiswa[0] ?></li>
            <li><?php echo $isielemenarraymahasiswa[1] ?></li>
            <li><?php echo $isielemenarraymahasiswa[2] ?></li>
            <li><?php echo $isielemenarraymahasiswa[3] ?></li>
        </ul>
    <?php endforeach; ?>


    <br><br><br> -->

    <!-- <?php 
        $angka = [[1,2,3],[7,8,9],[6,9,8]];
    ?>

    <?php foreach ($angka as $a): ?>
        <?php foreach ($a as $nil) : ?>
        <div class="kotak"><?php echo $nil ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>
     -->

    <!-- Array associative -->

    <!-- <?php 
    $mahasiswa = [
        ["nama" => "Riza SR",
        "NIK" => "162079",
        "Email" => "rifa71426@gmail.com",
        "Jurusan" => "Teknik Elektro",
        "gambar" => "ok.jpg"],
        ["nama" => "Alvin F",
        "NIK" => "162078",
        "Email" => "al@gmail.com",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "ok.jpg"]
        // "tugas" => [90,86,78,100]]
    ];
    ?>
    <h2>Daftar Orang Sukses Dunia hIngga Akhirat</h2>
    <?php foreach ($mahasiswa as $mhs) : ?> 
        <ul>
         <li> <img src="img/<?php echo $mhs["gambar"];?>" alt=""></li>   
        <li><?php echo $mhs["nama"]; ?></li>
        <li><?php echo $mhs["NIK"]; ?></li>
        <li><?php echo $mhs["Email"]; ?></li>
        <li><?php echo $mhs["Jurusan"]; ?></li> 

        </ul>
       
    
    <?php endforeach; ?>
  -->
    
    
    


    
</body>
</html>

