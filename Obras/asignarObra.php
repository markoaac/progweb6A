<?php 
    session_start();
    $id_usuario = $_POST['cmbUsuario'];
    $id_obra = $_POST['cmbObras'];
    include("../Conexion/cn.php");
    $cmd = $conexion->prepare("insert into ObrasUsuarios
     (Id_Obra,Id_Usuario) values(?,?)");
    $cmd->bind_param("ii",$id_obra,$id_usuario);
    $cmd->execute();

    ?>