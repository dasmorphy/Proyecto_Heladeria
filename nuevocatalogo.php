<?php
include ("conexion.php");

$id = $_POST["catalogo"];
$descripcion = $_POST["descripcion"];
$codigo = $_POST ["codigo"];
$estado = $_POST["estado"];

$insertar = "INSERT INTO  mantenimiento_catalogo (IDTABLA, DESCRIPCION, CODIGO, ESTADO) VALUES 
('$id', '$descripcion', '$codigo', '$estado')";

$verificarcatalogo = mysqli_query($conexion, "SELECT * FROM mantenimiento_catalogo where descripcion = '$descripcion'");

if (mysqli_num_rows($verificarcatalogo) > 0){
    echo '<script type="text/javascript">';
    echo 'alert("Catálogo o código ya registrado, por favor ingrese otro");';
    
    echo 'window.location.href="formcatalogo.php";';
   
    echo '</script>';
    exit();
}

$verificarcode = mysqli_query($conexion, "SELECT * FROM mantenimiento_catalogo where codigo = '$codigo'");

if (mysqli_num_rows($verificarcode) > 0){

    echo '<script type="text/javascript">';
    echo 'alert("Catálogo o código ya registrado, por favor ingrese otro");';
    echo 'window.location.href="formcatalogo.php";';
   
    //echo 'return (false);';
    echo '</script>';
    exit();
}

$resultado = mysqli_query($conexion, $insertar);
if ($resultado){
    echo '<script>';
    echo 'alert("Catalogo Registrado!");';
    echo 'window.location.href="catalogos.php";';
    echo '</script>';
    
}



    
?>

