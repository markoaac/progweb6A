<?php

    $Id = $_POST['txtId'];
    $Obra = $_POST['txtObra'];
    $Descripcion = $_POST['txtDescripcion'];
    $Inicio = $_POST['txtInicio'];
    $Fin = $_POST['txtFin'];
    include("../Conexion/cn.php");
    if($cmd=$conexion->prepare("update Obras set Obra=?, Descripcion=?, fechaInicio=?, fechaFin=? where Id=?")){
        $cmd->bind_param("ssssi",$Obra, $Descripcion,$Inicio,$Fin,$Id);
        $cmd->execute();
        $cmd->close();
        mysqli_close($conexion);
        header("location: Obras.php");
    }
    else{
        echo "Ocurrió un error a la hora de actualizar";
    }
