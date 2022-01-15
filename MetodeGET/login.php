
<?php 
//cek apakah sudah pernah menekan tombol kirim atau belum
if (isset($_POST["submit"])){
    //cek apakah username dan password nya benar
    if ($_POST["nama"] =="riza" && $_POST["pass"] == "123"){
        //redirect ke halaman admin
        header("Location: admin.php");
    }else {
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Silahkan Login Dulu</h1>
    <br>


    <?php if(isset($error)) :?>
    <p> Username/Password Salah</p>
    <?php endif; ?>


    
    <ul>
        <form action="" method="POST">
            <li>
                <label for="username">Username :</label>
                <input type="text" name="nama" id="username">
            </li>
            <br>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="pass" id="password">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>

        </form>
    </ul>
</body>
</html>