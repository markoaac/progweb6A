<?php
session_start();
include("../Conexion/cn.php");
$cmd = "select Evidencia from Evidencias 
where Id=1";
$resultado = $conexion->query($cmd);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
header("content-type: image/jpeg");
echo $row['Evidencia'];
?>