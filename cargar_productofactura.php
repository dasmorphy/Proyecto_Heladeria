
<?php 
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "heladeria");
  
  
  return $mysqli;
}
?>

  
<?php 

function getidproduct(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `producto` order by nombre';
  $result = $mysqli->query($query);
  $producto = '<option  value="" disabled selected>Elige una opción </option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $producto .= "<option value='$row[id_producto]'>$row[nombre]</option>";
  }
  return $producto;
}

echo getidproduct();