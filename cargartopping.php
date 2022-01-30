
<?php 
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "heladeria");
  
  
  return $mysqli;
}
?>

  
<?php 

function GetTopping(){
  $mysqli = getConn();
  $query = "SELECT * FROM mantenimiento_catalogo where IDTABLA like '%TOPPING%' " ;
  $result = $mysqli->query($query);
  $topping = '<option  value="" disabled selected>Elige un topping </option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $topping .= "<option value='$row[id_catalogo]'>$row[DESCRIPCION]</option>";
  }
  return $topping;
}

echo GetTopping();