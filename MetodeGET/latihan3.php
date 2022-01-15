<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>


    <!-- //Mengirim data melalui form 
    //Kemudian menangkap data dengan POST
    //dihalaman yang sama -->

    <!-- //<?php //echo var_dump($_POST) ?> -->
    <?php if (isset($_POST["submit"])) : ?>
    <h1>Selmat Datang <?php echo $_POST["input"]; ?></h1>

    <?php endif; ?>


    <form action="" method="POST">
        <label for="nama">Nama : </label><input type="text" id="nama" name="input"></input>
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</body>
</html>