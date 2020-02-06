<?php

$usuario = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];
if($usuario == "Marco" && $password == "123"){
    header("location: Principal.php");
}
else{
    header("location: Login.php?status=400");
}

?>