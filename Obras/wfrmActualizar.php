<?php
    session_start();
    if(!isset($_SESSION['autenticado'])){
        header("location: Login.php?status=500");
    }
    include("../Conexion/cn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
        include("../Layout/estilos.php");
    ?>
</head>
<body>
    <?php
        include("../Layout/header.php");
        if(!isset($_GET['Id'])){
            header("location: Obras.php");
        }
        else{
            $id = $_GET['Id'];
            $cmd = $conexion->prepare("select * from Obras where Id=?");
            $cmd->bind_param("i",$id);
            $cmd->execute();
            $cmd->bind_result($Id,$Obra,$Descripcion,$Inicio,$Fin);
            $cmd->store_result();
            $cmd->fetch();
            $cmd->close();
        }

    ?>

        <form class="container" method="post" action="actualizarObra.php">
            <input type="hidden" name="txtId" value="<?php echo $Id; ?>">
            <div class="form-group row">
                <div class="col-md-4">
                    <label>Nombre de la obra</label>
                    <input type="text" name="txtObra" id="" 
                    class="form-control" value="<?php echo $Obra; ?>">
                </div>
                <div class="col-md-8">
                    <label>Nombre de la obra</label>
                    <textarea name="txtDescripcion"
                     id="" class="form-control"><?php echo $Descripcion; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Fecha Inicio</label>
                    <input type="date" name="txtInicio"
                     id="" class="form-control" value="<?php echo $Inicio; ?>">
                </div>
                <div class="col-md-6">
                    <label>Fecha Fin</label>
                    <input type="date" name="txtFin"
                     id="" class="form-control" value="<?php echo $Fin; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <input type="submit" value="Actualizar"
                    class="btn btn-warning">
                    <a href="Obras.php" class="btn btn-info">Regresar</a>
                </div>
            </div>
        </form>
        
    <?php include("../Layout/scripts.php");
    ?>    
</body>
</html>