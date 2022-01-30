<?php
    include ("conexion.php");
    $tbody = $_POST('tbody');
    $producto = $_POST('producto');
    $descripcion = $_POST('descripcion');
    $cantidad = $_POST('cantidad');
    $precio_unitario = $_POST('precio_unitario');
    $precio_total = $_POST('precio_total');

    if ('guardarfactura'){
        $insertar = "INSERT INTO  factura (producto, descripcion, cantidad, precio_unitario, precio_total) VALUES 
        ('$producto', '$descripcion', '$precio_unitario', '$precio_total')";
    }
    $resultado = mysqli_query($conexion, $insertar);
    if ($resultado){
        echo '<script>';
        echo 'alert("Catalogo Registrado!");';
        echo 'window.location.href="catalogos.php";';
        echo '</script>';
    }
    

?>
