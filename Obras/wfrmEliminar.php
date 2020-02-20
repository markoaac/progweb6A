<?php
    session_start();
    if(!isset($_SESSION['autenticado'])){
        header("location: Login.php");
    }
    include("../Conexion/cn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        include("../Layout/estilos.php");
    ?>
</head>
<body>
    <?php 
        include("../Layout/header.php");
        //aquí vamos a programar la parte de la consulta para saber que obra es
        if(!isset($_GET['Id'])){
            header("location: Obras.php");
        }
        else{
            $id = $_GET['Id'];
            $cmd = $conexion->prepare("select * from Obras where Id=?");//comando
            $cmd->bind_param("i",$id);
            $cmd->execute();
            $cmd->bind_result($Id,$Obra,$Descripcion,$Inicio,$Fin);//Variables para asignar el valor de cada una de las filas
            $cmd->store_result();
            $cmd->fetch();//muy importante para que las variables se puedan vincular
        }
    ?>
    <br>
    <form action="eliminarObra.php" method="post">
        <input type="hidden" name="txtId" value="<?php echo $Id; ?>" >
        <div class="form-group row">
            <div class="col-12 text-center">
                <h1 class="text-danger">¿Estas seguro que quieres eliminar la obra: <?php echo $Obra; ?></h1>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 text-center">
                <input type="submit" value="Eliminar" class="btn btn-danger">
                <a href="Obras.php" class="btn btn-info">Regresar a obras</a>
            </div>
        </div>
    </form>

    <?php
        include("../Layout/scripts.php");
    ?>
</body>
</html>