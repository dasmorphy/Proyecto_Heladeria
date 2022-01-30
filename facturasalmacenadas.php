<?php

include ("conexion.php");


//$usuario = $_POST ['usuario'];
//$cliente = $_POST['cliente'];
//$fecha = $_POST['fecha'];
//$producto = $_POST['producto'];
//$descripcion = $_POST['descripcion'];
//$cantidad = $_POST('cantidad');
//$precio_unitario = $_POST['precio_unitario'];
//$precio_total = $_POST ['precio_total'];
//$jsondata = $_REQUEST['data'];

//$data = json_decode($jsondata, true);
$cadena = "INSERT INTO factura (producto, descripcion, cantidad, precio_unitario, precio_total) VALUES";
$facturacion = $_POST ['arregloDatos'];
for ($i = 0; $i < count($facturacion); $i++){
  $cadena.="('".$facturacion[$i]."'),";
}

echo json_encode(array ('cadena' => $cadena));

print_r($usuario);

  foreach ($data as $row) {
    
    
    $sql = "INSERT INTO facturas (usuario, cliente, fecha, producto, descripcion, cantidad, precio_unitario, precio_total) VALUES 
    ('$usuario', '$cliente', '$fecha', '$producto', '$descripcion', '$cantidad', '$precio_unitario', '$precio_total')";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado){
        
        echo ("se guardo correctamente");
    }
}
?>