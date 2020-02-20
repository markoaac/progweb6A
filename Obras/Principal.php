<?php
    session_start();
    if(!isset($_SESSION['autenticado'])){
        header("location: Login.php?status=500");
    }
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
            <div class="jumbotron">
                <h2 class="text-danger">Bienvenido</h2>
                <h1><?php echo $_SESSION['usuario'] ?></h1>
            </div>
        </div>
        
    <?php include("../Layout/scripts.php");
    ?>    
</body>
</html>