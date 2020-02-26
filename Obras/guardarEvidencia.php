<?php
session_start();
include("../Conexion/cn.php");
$id_usuario = $_SESSION['IdUsuario'];
$id_obra = $_POST['cmbObras'];
$fecha = date("Y-m-d");
$evidencia = addslashes(file_get_contents
($_FILES['evidencia']['tmp_name']));
$cmd = $conexion->prepare("insert into Evidencias 
(Id_Obra, FechaEvidencia, Id_Usuario, Evidencia) values
(?,?,?,'$evidencia')");
$cmd->bind_param("isi",$id_obra,$fecha,$id_usuario);
$cmd->execute();
echo $cmd->error;
mysqli_close($conexion);
?>