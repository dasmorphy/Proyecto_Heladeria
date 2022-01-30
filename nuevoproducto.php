<?php

include ("conexion.php");

$id = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];



$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));


$insertar = "INSERT INTO  producto (nombre, descripcion, precio, imagen) VALUES 
('$id', '$descripcion', '$precio', '$image')";


$verificarprod = mysqli_query($conexion, "SELECT * FROM producto where nombre = '$id'");

if (mysqli_num_rows($verificarprod) > 0){
    echo '<script>';
    echo 'alert("Producto ya registrado, por favor ingrese otro");';
    echo 'window.location.href="formproducto.php";';
    //echo 'return (false);';
    echo '</script>';
    exit();
}


$resultado = mysqli_query($conexion, $insertar);
if ($resultado){
    
    echo '<script>';
    echo 'alert("Producto Registrado!");';
    echo 'window.location.href="precios.php";';
    echo '</script>';
}
?>