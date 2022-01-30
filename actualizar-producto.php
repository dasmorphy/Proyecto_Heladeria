<?php
include ("conexion.php");
$id = $_POST ['id_producto'];
$nombre = $_POST ['nombre'];
$descripcion = $_POST ['descripcion'];
$precio = $_POST ['precio'];



$actualizar = "UPDATE producto SET id_producto = '$id', nombre = '$nombre', descripcion = '$descripcion', precio = '$precio'
WHERE id_producto = '$id'";
$resultado = mysqli_query($conexion, $actualizar);

if ($actualizar){
    echo '<script>';
    echo 'alert("Producto actualizado!");';
    echo 'window.location.href="precios.php";';
    echo '</script>';
}



?>