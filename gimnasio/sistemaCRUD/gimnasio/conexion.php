<?php
$conexion = new mysqli("localhost:3307","root","","gimnasio");

if($conexion->connect_error) {
    die("Error de conexion: " .$conexion->connect_error);
}
?>