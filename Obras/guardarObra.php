<?php
include("../Conexion/cn.php");
$obra = $_POST['txtObra'];
$descripcion = $_POST['txtDescripcion'];
$inicio = $_POST['txtInicio'];
$fin = $_POST['txtFin'];
$cmd = $conexion->prepare("insert into Obras 
(Obra,Descripcion,FechaInicio,FechaFin) 
 values (?,?,?,?);");
 $cmd->bind_param("ssss",$obra,$descripcion,
 $inicio,$fin);
 $cmd->execute();
 echo $cmd->error;
 mysqli_close($conexion);
 ?>