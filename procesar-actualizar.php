<?php
include ("conexion.php");
$id = $_POST ['id_catalogo'];
$categoria = $_POST ['IDTABLA'];
$descripcion = $_POST ['DESCRIPCION'];
$codigo = $_POST ['CODIGO'];
$estado = $_POST ['ESTADO'];


$actualizar = "UPDATE mantenimiento_catalogo SET id_catalogo = '$id', IDTABLA = '$categoria', 
DESCRIPCION = '$descripcion', CODIGO = '$codigo', ESTADO= '$estado' WHERE id_catalogo = '$id'";
$resultado = mysqli_query($conexion, $actualizar);

if ($actualizar){
    
    echo '<script>';
    echo 'alert("Catalogo actualizado!");';
    echo 'window.location.href="catalogos.php";';
    echo '</script>';
        
    
    
}


?>