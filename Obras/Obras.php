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
        <br>
        <p>
            <a href="wfrmAgregarObra.php" class="btn btn-success">Agrear una nueva obra</a>
        </p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Obra</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Inicio</th>
                    <th scope="col">Fin</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cmd = "select * from Obras where Id in (select Id_Obra from ObrasUsuarios where Id_Usuario=". $_SESSION['IdUsuario'].")";
                    $resultado = $conexion->query($cmd);
                    while($row = $resultado->fetch_array(MYSQLI_ASSOC)) : ?> <!-- Cierre de PHP y continuamos con HTML -->
                        <tr>
                            <td><?php echo $row['Id']; ?></td><!-- Id-->
                            <td><?php echo $row['Obra']; ?></td><!-- Obra-->
                            <td><?php echo $row['Descripcion']; ?></td><!-- Descripción-->
                            <td><?php echo $row['FechaInicio']; ?></td><!--Inicio-->
                            <td><?php echo $row['FechaFin']; ?></td><!-- Fin-->
                            <td><a href="wfrmActualizar.php?Id=<?php echo $row['Id']; ?>" class="btn btn-warning">Actualizar</a></td><!-- TD para el botón de actualizar aquí colocaremos una etiqueta <a> para vincularlo a otra página-->
                            <td><a href="wfrmEliminar.php?Id=<?php echo $row['Id']; ?>" class="btn btn-danger">Eliminar</a></td><!-- TD para el botón de eliminar lo mismo para el siguiente hipervínculo-->
                        </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php include("../Layout/scripts.php");
    ?>
</body>

</html>