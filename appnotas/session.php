
<?php 
session_start(); 
if(!$_SESSION['usuario']){
    header('Location:index.php');
}
$enlace = mysqli_connect("localhost", "root", "", "appnotas");
