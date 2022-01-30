
<?php 
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "heladeria");
  
  
  return $mysqli;
}
?>

  
<?php 

function GetSabores(){
  $mysqli = getConn();
  $query = "SELECT * FROM mantenimiento_catalogo where IDTABLA like '%SABORES%' " ;
  $result = $mysqli->query($query);
  $sabores = '<option  value="" disabled selected>Elige un sabor </option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $sabores .= "<option value='$row[id_catalogo]'>$row[DESCRIPCION]</option>";
  }
  return $sabores;
}

echo GetSabores();