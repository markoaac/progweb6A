<?php
    session_start();
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
        <form action="validarSesion.php" method="post">
        <br />
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card border-dark">
                        <h5 class="card-header bg-dark text-white text-center">Iniciar Sesión</h5>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="../Images/obras-png-1.png" width="150" height="150" class="img-fluid" />
                            </div>
                            <div class="form-group">
                                <label for="txtUsuario">Usuario</label>
                                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="txtPassword">Password</label>
                                <input type="password" name="txtPassword" id="txtPassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" 
                                class="btn btn-outline-dark btn-block"
                                 value="Iniciar Sesión" />
    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 col-md-2 col-lg-4"></div>
        </form>
    </div>
    <?php
        include("../Layout/scripts.php");
        if(isset($_GET["status"])){
            $status = $_GET['status'];  
            echo "<script type='text/javascript' >";
            if($status == 400){
                echo "swal('Cuidado','User incorrecto','warning');";
            }   
            if($status == 500){
                echo "swal('Cuidado','Error de sesión','error');";
            }    
            echo "</script>"; 
        }
    ?>
</body>

</html>