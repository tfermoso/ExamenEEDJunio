<?php
require("./header.php");

if($_POST){
    $id=$_POST['id'];
    $titulo=$_POST['titulo'];
    $cuerpo=$_POST['cuerpo'];
    $consulta="UPDATE notas SET titulo = '$titulo', cuerpo = '$cuerpo' WHERE id = $id";
    $resultado=$enlace->query($consulta);
    if($resultado){
        header('Location:notas.php');
    }else{
        echo "Error al eliminar el usuario";
    }

}



if($_GET){
$id=$_GET['id'];
$consulta="select * from notas where id=$id";
$resultado=$enlace->query($consulta);
$nota = $resultado->fetch_assoc();
}
?>
<h3>Editar nota</h3>
<form action="" method="post">
        <input type="hidden" name="id" value=<?php echo $nota['id']; ?>>
        <input type="text" name="titulo" value="<?php echo $nota['titulo']; ?>">
        <input type="text" name="cuerpo" value="<?php echo $nota['cuerpo']; ?>">
        <input type="submit" value="Guardar">
</form>