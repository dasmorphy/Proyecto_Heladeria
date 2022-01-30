<?php
    include ("conexion.php");
    $id = $_GET['id'];
    $eliminar = "DELETE FROM mantenimiento_catalogo  WHERE id_catalogo = '$id'";
    $resultado = mysqli_query($conexion, $eliminar);
    if($eliminar){
        echo '<script>';
		echo 'alert("Catalogo Eliminado!");';
		echo 'window.location.href="catalogos.php";';
	    echo '</script>';
        
    }


    

?>
