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
    ?>
    <div class="container">
        <br />
        <form action="asignarObra.php" method="post">
            <div class="form-group row">
                <div class="col-6">
                    <label>Usuario</label>
                    <select name="cmbUsuario" id="cmbUsuario"
                     class="form-control">
                        <?php
                            $cmd = "select * from Usuarios";
                            $resultado = $conexion->query($cmd);
                            while($row = $resultado->fetch_array(MYSQLI_ASSOC)): ?>
                            <option value="<?php echo $row['Id']; ?>">
                                <?php echo $row['Nombre']; ?>
                            </option>  
                            <?php endwhile; ?>
                     </select>
                </div>
                <div class="col-6">
                    <label>Obras</label>
                    <select name="cmbObras" id="cmbObras" 
                    class="form-control">
                    <?php
                            $cmd = "select * from Obras";
                            $resultado = $conexion->query($cmd);
                            while($row = $resultado->fetch_array(MYSQLI_ASSOC)): ?>
                            <option value="<?php echo $row['Id']; ?>">
                                <?php echo $row['Obra']; ?>
                            </option>  
                            <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <input type="submit" value="Asignar"
                    class="btn btn-dark">            
                </div>
            </div>
        </form>
    </div>

    <?php include("../Layout/scripts.php");
    ?>
</body>

</html>