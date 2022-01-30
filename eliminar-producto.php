<?php
    include ("conexion.php");
    $id = $_GET['id'];
    $eliminar = "DELETE FROM producto  WHERE id_producto = '$id'";
    $resultado = mysqli_query($conexion, $eliminar);
    if($eliminar){
        echo '<script>';
		echo 'alert("Producto Eliminado!");';
		echo 'window.location.href="precios.php";';
	    echo '</script>';
    }


    

?>
