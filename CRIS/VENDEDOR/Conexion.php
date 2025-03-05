<?php
$conexion = mysqli_connect("localhost", "root", "", "wed");
if(!$conexion){
    die("Error de conexión: " . mysqli_connect_error());
}
?>