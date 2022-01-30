
<?php
include ("conexion.php");
session_start();
if (!isset($_SESSION['usuario'])){
    header("Location: index.php");
}           
                
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precios</title>
    
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>

            
            
        
        img{
            height: 12rem
        }
        .title {
                margin: 0;
                text-align: center;
                height: 10rem;
                font-size: 700%;
                color: rgb(243, 139, 42);
                background-size: 100%;
                background-image: url(img/portada.jpg);
            }
        #footer {
            background: #004c97;
            color: #fff;
            text-align: center;
        }
        .back{
                
                display: flex;
                float: right;
                
                
                
            }
        .button-center{
            
            display: flex;
            margin-left: 3rem;
            margin-bottom: 10px;
           
        }
        
    </style>
</head>
<script type = "text/javascript">
    function ConfirmDelete(){
        var respuesta = confirm("¿Esta seguro que desea eliminar este producto?");
        if (respuesta == true){
            header ("location: precios.php");
            return true;
        }
        else{
            return false;
        }
    }

</script>

<body style="background-image: linear-gradient(to top, #a3bded 0%, #6991c7 100%);">
    <header  class="container">

        <b><h1 class="title" style="background-image: url(img/portada.jpg);">HELADERIA S.A</h1></b>
        <br>
        
        <a href="options.php" ><input class= "back btn btn-warning " type="button"  value="Regresar al Menú Principal"></a>
        <br><br>
    </header>




    <div class="container" >
    
        <h2>Registro de Precios</h2>
		<hr>
        
        <a href="formproducto.php"><input style= "margin-right: 60.7rem;"class= "back btn btn-primary" type="button" value="Nuevo Producto"></a>
		<br><br>
		<section class="row" >
           
		<?php 
			 $sql="SELECT * from producto";
             $result=mysqli_query($conexion,$sql);
             while($mostrar=mysqli_fetch_array($result)){	
				
		?>
		<article class="col-md-3" >
           
				<div class="card" style="width: 18rem; height: 100%;">
                <img src="data:image/jpg;base64, <?php echo base64_encode($mostrar['imagen']);?>"/>
				  
				  <div class="card-body " >
                      <td ><?php echo $mostrar['nombre']?></td><br>
                      <td><?php echo $mostrar['descripcion']?></td><br>
                      
                      <td>
                            <label>Precio: $</label>
                            <?php echo $mostrar['precio']?>
                        </td>
                      
                    </div>
                  <div class="button-center">
                  
                    <a href="editar-producto.php?id=<?php echo $mostrar ["id_producto"]; ?>"><input style="margin-right: 6px;" class= "btn btn-primary " type="button"  value="Editar"></a>
                    
                    <a href="eliminar-producto.php?id=<?php echo $mostrar ["id_producto"]; ?>"><input class= "btn btn-danger " type="button" onclick="return ConfirmDelete()" value="Eliminar"></a>
                  </div>
                  
				  
				</div>
                
               
			</article>
            
			<?php } ?>
		</section>
		
	</div>	
	
	<div class="container" >
        <br>
        <br>
	<br>
	<hr>
		<footer id="footer">
			<br>HELADERIA S.A.<br>
			¿Quienes Somos?-Términos y condiciones-Contacto-Políticas<br><br>
		</footer> 
	</div>
</body>

</html>

