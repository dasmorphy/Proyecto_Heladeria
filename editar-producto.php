
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        //Metodo para que registre dos decimales ej 0.00
        $(document).ready(function () { 
        $(".floatNumberField").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        img{
            height: 18rem
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
        
        .edit-product{
            
            display: flex;
            margin-left: 3rem;
            margin-bottom: 10px;
           
        }
    </style>
</head>

<body style="background-color:  rgb(125, 180, 180);">
    <header  class="container">

        <b><h1 class="card-title title" style="background-image: url(img/portada.jpg);">HELADERIA S.A</h1></b>
        <br>
        
    </header>



 
<div class="container" >
    
        <h2>Registro de Precios</h2>
		<hr>
		
		<section class="main row">
		<?php 
            $id= $_GET ["id"];
			 $sql="SELECT * from producto WHERE id_producto='$id'";
             $result=mysqli_query($conexion,$sql);
             while($mostrar=mysqli_fetch_array($result)){	
				
		?>
        <form action="actualizar-producto.php" method="POST">
            <article class="col-md-3">
            
                <div class="card" style="width: 18rem;">
                    
                    <img src="data:image/jpg;base64, <?php echo base64_encode($mostrar['imagen']);?>"/>
                    
                    <div class="card-body precio" >

                        <input type="hidden"value="<?php echo $mostrar['id_producto']?>" name="id_producto"></input>
                        <td>
                            <label for="">Nombre:</label>
                            <input  oninput="this.value = this.value.toUpperCase()" value="<?php echo $mostrar['nombre']?>" name="nombre" maxlength="50" required>
                        </td><br>
                        <td>
                            <label for="">Descripcion:</label><br>
                            <select id="sabores" ></select>
                            <button class="btn btn-success " type="button" id="btnsabores" style="height: 10%; text-align:initial;">+</button>
                            <select id="topping" ></select>
                            <button class="btn btn-success " type="button" id="btntopping" style="height: 10%;" >+</button><br><br>
                            <input id="catalogos"  oninput="this.value = this.value.toUpperCase()" value="<?php echo $mostrar['descripcion']?>" name="descripcion" maxlength="150" required><br>
                            
                        </td>

                        
                        
                        <td>
                            <br>
                            <label for="">Precio: </label>
                            <br>
                            <!-- el metodo de onkeyup permite 
                            ingresar solo valores numericos desde js deja inluir al user los valores "." y "," -->
                            <p>$<input onkeyup="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');" class ="floatNumberField" type="text" maxlength="5" value="<?php echo $mostrar['precio']?>" placeholder= "0.00"name="precio" required> </p>
                            
                        </td>
                        
                    </div>
                    <div class="edit-product">
                        <input style="margin-right: 6px;" class= "btn btn-success"type="submit" value="Actualizar">
                        
                        <a href= "precios.php"><input class= "btn btn-danger " type="button"  value="Cancelar"></a>
                    </div>
                    
                    
                </div>
                    
                
            </article>
        </form>
            
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
<script src="./js/description_product.js"></script>
<script type="text/javascript">
    
   $(function(){
        $('#btnsabores').click(function(){
            if (document.getElementById('catalogos').value !== '') {
            document.getElementById('catalogos').value += ' + ' + $('select[id="sabores"] option:selected').text();
            }
            else {
            document.getElementById('catalogos').value += $('select[id="sabores"] option:selected').text();
            }
        });
    });
    $(function(){
        $('#btntopping').click(function() {
            if (document.getElementById('catalogos').value !== '') {
            document.getElementById('catalogos').value += ' + ' + $('select[id="topping"] option:selected').text();
            }
            else {
            document.getElementById('catalogos').value += $('select[id="topping"] option:selected').text();
            }
        });
    });

    
    document.getElementById('borrar').addEventListener('click', () => {
        var texto = document.getElementById('catalogos');
        texto.value = texto.value.slice(0, -1);
                // alternativa:
                // texto.value.slice(0, -1);
    });
    
</script>

