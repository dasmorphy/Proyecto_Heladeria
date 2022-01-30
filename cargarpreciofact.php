<?php 
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "heladeria");

  return $mysqli;
}
?>

<?php 

function getprecio(){
  $mysqli = getConn();
  $id = $_POST['id_producto'];
  $query = "SELECT * FROM `producto` WHERE id_producto = $id";
  $result = $mysqli->query($query);
  $precio = '';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $precio .= "<option value='$row[id_producto]'>$row[precio]</option>";
  }
  return $precio;
}

echo getprecio();
