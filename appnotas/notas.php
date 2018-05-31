<?php
require("./header.php");
?>

    <form action="" method="post">
        <input type="text" name="titulo" id="" placeholder="titulo">
        <input type="text" name="cuerpo" id="">
        <input type="submit" value="Crear nota">

    </form>

    <?php 
if($_POST!=null){
    $consulta = "insert into notas (titulo,cuerpo,id_autor) values ('[titulo]','[cuerpo]',[id_usuario])";

    $consulta = str_replace("[titulo]", $_POST['titulo'], $consulta);
    $consulta = str_replace("[cuerpo]", $_POST['cuerpo'], $consulta);
    $consulta = str_replace("[id_usuario]", $_SESSION['idUsuario'], $consulta);
    
    $resultado = $enlace->query($consulta);
}

?>
<hr>
<table>
    <thead>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Autor</th>
        <th>Operaciones</th>
    </thead>
    <tbody>

   
<?php
$consulta = "SELECT notas.id,titulo,cuerpo,usuarios.nombre as autor FROM notas,usuarios WHERE id_autor=usuarios.id";
$resultado = $enlace->query($consulta);

while ($nota = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>$nota[titulo]</td>
        <td>$nota[cuerpo]</td>
        <td>$nota[autor]</td>
        <td><a href='editar.php?id=$nota[id]'><i class='fas fa-edit'></i></a> <a href='eliminar.php?id=$nota[id]'><i class='fas fa-trash-alt'></i></a> </td>
        </tr>";
}
?>
 </tbody>
</table>

</body>
</html>