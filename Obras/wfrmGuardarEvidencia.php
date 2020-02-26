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
           <form action="guardarEvidencia.php" method="post"
           enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Obra</label>
                        <select name="cmbObras" 
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
                    <div class="col-md-12">
                        <label>Evidencia</label>
                        <input type="file" name="evidencia"
                         id="evidencia" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <input type="submit" value="Guardar"
                        class="btn btn-dark">
                    </div>
                </div>
           </form>
        </div>
        
    <?php include("../Layout/scripts.php");
    ?>
    <script>
        $("#evidencia").fileinput({
            language: "es",
            allowedFileExtensions: ["png","jpg"]
        });
    </script>    
</body>
</html>