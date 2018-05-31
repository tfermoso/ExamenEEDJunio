
<?php
session_start();
$enlace = mysqli_connect("localhost", "root", "", "appnotas");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>

</head>
<body>
<div class="container">
<div class="row">
        <div class="col-sm-12 col-md-6 col-md-offset-3">
    
        <form class="form-signin" action="" method="post" >
        <h1 class="form-signin-heading text-center">Aplicación login</h1>
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre de usuario">
            <input class="form-control" type="password" name="password" placeholder="contraseña" id="password">
          
            <input  class="btn  btn-primary col-md-6 col-sm-12" type="submit" id="btnSubmit" value="Enviar"/>
            <input class="btn btn-primary col-md-6 col-sm-12" type="reset"/> 
        </form>
        <div id="error"></div>
  

    <a href="registro.php">Nuevo usuario</a>
    </div>
    </div>
    </div>
   
    <?php
    if ($_POST != null) {        
        $consulta = "select * from usuarios where nombre='[nombre]' and password='[password]'";
        $consulta = str_replace("[nombre]", $_POST['nombre'], $consulta);
        $consulta = str_replace("[password]", $_POST['password'], $consulta);
        $resultado = $enlace->query($consulta);



        if ($resultado->num_rows > 0) {
            $fila = mysqli_fetch_row($resultado);
            // var_dump($fila);
            // exit();
            $_SESSION['usuario']=$_POST['nombre'];
            $_SESSION['idUsuario']=$fila[0];
            header('Location:notas.php');
        } else {

            // echo "<p>acceso incorrecto</p>";
        }
    }
    ?>

   
</body>
</html>