<?php 
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "heladeria");
  
  return $mysqli;
}
?>

<?php 

function getdescripcion(){
  $mysqli = getConn();
  $id = $_POST['id_producto'];
  $query = "SELECT * FROM `producto` WHERE id_producto = $id";
  $result = $mysqli->query($query);
  $descripcion = '';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $descripcion .= "<option value='$row[id_producto]'>$row[descripcion]</option>";
  }
  return $descripcion;
}

echo getdescripcion();
