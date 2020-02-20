<?php

$Id = $_POST["txtId"];// este campo es el hidden de la página anterior
//es hidden para que no se muestre en la página
include("../Conexion/cn.php");
if($cmd=$conexion->prepare("delete from Obras where Id=?")){
    $cmd->bind_param("i",$Id);
    $cmd->execute();
    $cmd->close();
    mysqli_close($conexion);
    header("location: Obras.php");
}
else{
    echo "Ocurrió un error, favor de verificar";
}

//en caso de que funcione bien, regresará a obras sin la obra eliminada
//en caso de un error en la consulta, mostrará el echo del else