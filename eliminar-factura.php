<?php
    include ("conexion.php");
    $id = $_GET['id'];
    $eliminar = "DELETE FROM productos  WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $eliminar);
    if($eliminar){
        echo '<script>';
		echo 'alert("Registro Eliminado!");';
		echo 'window.location.href="consultas-ventas.php";';
	    echo '</script>';
        
    }


    

?>
