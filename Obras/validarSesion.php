<?php
    session_start();
    include("../Conexion/cn.php");
    $nombre = $_POST['txtUsuario'];
    $password = $_POST['txtPassword'];
    $cmd = $conexion->prepare("select * from Usuarios ".
    " where usuario=? and pwd=?");
    $cmd->bind_param("ss",$nombre,$password);
    $cmd->execute();
    $cmd->store_result();
    /*$cmd = "select * from Usuarios where".
    " usuario='".$nombre."' and pwd='".$password.
    //' or 'a' = 'a
    "'";
    $resultado =$conexion->query($cmd);*/
    if($cmd->num_rows > 0){
       $_SESSION['autenticado'] = true;
       $_SESSION['usuario'] = $nombre;
       header("location: Principal.php");
    }
    else{
        //acción cuando es incorrecto
        header("location: Login.php?status=400");
    }


?>