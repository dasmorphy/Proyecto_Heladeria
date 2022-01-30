<?php
    require_once("conexion.php");
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    
    <style>
            table {
                height: 10rem;
                background-color: rgb(211, 208, 208);
                border-collapse: collapse;
                font-size: 12pt;
                font-family: arial;
                width: 100%;
                
            }
                
            table th {text-align: left;
                padding: 10;
                background: #3d7ba8;
                color: #fff;
                height: 3rem
            }
            table tr:nth-child(odd) {
                background: #fff;
            }
            table td{
                padding: 10px;
            }
            .link_edit {
                color: #0ca4ce;
                text-decoration: none;
            }
            .link_delete{
                color: red;
                text-decoration: none;
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
            .form-search{
                margin-left: 10px;
                display: flex;
                float: center;
                background: initial;
                padding: 7px;
                
                border-radius: 10px;

            }
            
            .button {
                display: flex;
                justify-content: space-between;
                height: 40px;
                
                width: 20rem;
                align-items: center;
            }
            #footer {
                background: #004c97;
                color: #fff;
                text-align: center;
            }
            </style>
                
    
</head>
<script type = "text/javascript">
    function ConfirmDelete(){
        var respuesta = confirm("¿Esta seguro que desea eliminar este catalogo?");
        if (respuesta == true){
            
            return true;
        }
        else{
            return false;
        }
    }

</script>
<body class= "container">


    <header>
        <b><h1 class="title">HELADERIA S.A</h1></b>
    </header>
    <br>

    <h2>Mantenimiento de Catálogos</h2>
    <br>
    


    
    <section>
        
        <?php
            //variables para iniciar la busqueda
            $busqueda= ( $_REQUEST ["busqueda"]);
            if (empty($busqueda))
            {
                header("location: catalogos.php"); 
           }
        ?>
      
        <div class="button">
            
            
             <a href="formcatalogo.php"><input style="margin-left: 20rem;" class= "back btn btn-warning" type="button" value="Nuevo"></a>
            
           
            <form action="buscar_catalogos.php" method="get" class="form-search">
                <input style="width: 20rem;" type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda;?>"> 
                <input type="submit" value="Buscar" class="btn_search">
            </form>
        </div>
        <br><br>
        <table>

           


            <tr>
                <th>Tipo de Catálogo</th>
                <th>Descripción</th>
                <th>Código</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php
               
                $sql= "SELECT * from mantenimiento_catalogo
                                                WHERE(
                                                
                                                IDTABLA LIKE '%$busqueda%' OR
                                                DESCRIPCION LIKE '%$busqueda%' OR
                                                CODIGO LIKE '%$busqueda%' OR
                                                ESTADO LIKE '%$busqueda%'

                                                )";
                                                
                                                                    
                                                                   
                
                
                
                $result=mysqli_query($conexion, $sql);
                while($mostrar = mysqli_fetch_array($result)){
                
                   
                
            ?>
                 
            <tr>
            
                <td><?php echo $mostrar['IDTABLA']?></td>
                <td><?php echo $mostrar['DESCRIPCION']?></td>
                <td><?php echo $mostrar['CODIGO']?></td>
                <td><?php echo $mostrar['ESTADO']?></td>
                <td style="width: 14rem;">
                    
                    <a class= "link_edit " href="editar-catalogo.php?id=<?php echo $mostrar ["id_catalogo"]; ?>"><input class= "btn btn-success " type="button" value="Editar"></a>
                    
                    <a class="link_delete " href="eliminar-catalogo.php?id=<?php echo $mostrar ["id_catalogo"]; ?>"><input class= "btn btn-danger " type="button" onclick="return ConfirmDelete()" value="Eliminar"></a>
                </td>
            </tr>
        
            <?php
            
            }
            
        

            ?>
            
        </table>
    </section>


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