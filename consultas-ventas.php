<?php
    require_once("conexion.php");
    session_start();
    if (!isset($_SESSION['usuario'])){
        header("Location: index.php");
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Ventas</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    
    <style>
            
            table {
                
                width: 100%;
                background-color: rgb(211, 208, 208);
                border-collapse: collapse;
                font-size: 11pt;
                font-family: arial;
                
                
            }
            table tr{
                height: 130px;
            }    
            table th {

                text-align: center;
                padding: 10;
                background: #3d7ba8;
                color: #fff;
                height: 3rem
            }
            table tr:nth-child(odd) {
                background: #fff;
            }
            table td{
                
                
                text-align: center;
                padding: 5px;
                
            }
            table td a{
                display: flex;
              
                
                padding: 0;
                
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
                margin-left: 24rem;
                display: flex;
                float: center;
                background: initial;
                padding: 7px;
                
                border-radius: 10px;

            }
            
            
            .back{
             
                display: flex;
                float: right;
                
                
            }
            #footer {
                background: #004c97;
                color: #fff;
                text-align: center;
            }
            </style>
                
    
</head>
<body class= "">


    <header>
        <b><h1 class="title">HELADERIA S.A</h1></b>
    </header>
    <br>
    <section>
        <a href="options.php" ><input class= "back btn btn-warning " type="button"  value="Regresar al Menú Principal"></a>
        <br>
        <br>
        <h2>Consulta de Ventas</h2>
        <section>
        
            
            
            <form action="# " method="get" class="form-search">
                <input style="width: 20rem;" type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                <input type="submit" value="Buscar" class="btn_search">
            </form>
        </div>
        <br><br>

     
        <table>


            <tr>
                <th>N. Factura</th>
                <th>Usuario</th>
                <th>Cliente</th>
                <th>C.I</th>
                <th>Fecha</th>

                <th>Producto</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>P. Unitario</th>
                <th>P. Total</th>
                <th>SubTotal</th>
                <th>Iva</th>
                <th>Total Fact</th>
                <th>Acciones</th>
            </tr>
            <?php
                
                $sql="SELECT * from facturas ";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr >
                
                <td><?php echo $mostrar['id']?></td>
                <td><?php echo $mostrar['usuario']?></td>
                <td><?php echo $mostrar['cliente']?></td>
                <td><?php echo $mostrar['ci']?></td>
                <td><?php echo $mostrar['fecha']?></td>
                <td><?php echo $mostrar['producto']?></td>
                <td><?php echo $mostrar['descripcion']?></td>
                <td><?php echo $mostrar['cantidad']?></td>
                <td><?php echo $mostrar['precio_unitario']?></td>
                <td><?php echo $mostrar['precio_total']?></td>
                <td><?php echo $mostrar['subtotal_factura']?></td>
                <td><?php echo $mostrar['iva_factura']?></td>
                <td><?php echo $mostrar['total_factura']?></td>

                
                <td >
                    <a class= "link_edit " href="./factura/factura.php?id=<?php echo $mostrar ["id"]; ?>"><input class= "btn btn-success " type="button" value="Detalles"></a>
                    
                    <a class="link_delete " href="eliminar-factura.php?id=<?php echo $mostrar ["id"]; ?>"><input style = "margin-top: 10px;" class= "btn btn-danger " type="button" onclick="return ConfirmDelete()" value="Eliminar"></a>
                </td>
            </tr>

            <?php
            }

            ?>
        </table>
    </section>
        <br>
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
    </section>

</body>
</html>