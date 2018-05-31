<?php
require('./session.php');
$id=$_GET['id'];

$consulta="delete from notas where id=$id";
$resultado=$enlace->query($consulta);
if($resultado){
    header('Location:notas.php');
}else{
    echo "Error al eliminar el usuario";
}