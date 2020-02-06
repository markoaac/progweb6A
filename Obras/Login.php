<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include ('../Layout/estilos.php');
        ?>
</head>

<body>
    <?php 
        include('../Layout/header.php');
    ?>
    <form method="post" action="validarSesion.php">
        <div class="container">
            <div class="form-group row">
                
                <div class="col-5">
                    <div class="card bg-danger text-white">
                        <div class="card-header">
                            Iniciar Sesión
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Usuario</label>
                                    <input type="text" name="txtUsuario" id="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Password</label>
                                    <input type="password" name="txtPassword" id="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="submit" class="btn btn-light"
                                value="Validar Sesión" /> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>
    <?php
        include('../Layout/scripts.php');
    ?>
</body>

</html>