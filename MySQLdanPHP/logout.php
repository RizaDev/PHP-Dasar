<?php 
//cara mematikan cookie, set mundur 1 jam
setcookie('id', '', time()-3600);
setcookie('key', '', time()-3600);
session_start();
//cara mematikan session
$_SESSION = [];
session_unset();
session_destroy();


header("Location: login.php");

?>