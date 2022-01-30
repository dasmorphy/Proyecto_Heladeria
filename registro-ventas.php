<?php
include("conexion.php");
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
}
$id_user = $_SESSION['usuario'];

$sql = "SELECT usuario from usuarios where 
    usuario = '$id_user'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
date_default_timezone_set('America/Guayaquil');
$fecha_actual = date("Y-m-d");
$rand = rand();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <style>
        .contenedor-boton {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: rgb(255, 126, 5);
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 300%;
            background-image: url(img/portada.jpg);
            margin: 0;
            text-align: center;
            height: 10rem;
            font-size: 600%;
            background-size: 100%;
        }

        .back {
            display: flex;
            float: right;
        }

        #footer {

            background: #004c97;
            color: #fff;
            text-align: center;
        }

        .close-sale {
            margin-top: 4rem;
            margin-left: 30rem;
        }

        .date {
            width: 40rem;
            margin-bottom: 2rem;
            margin-left: 17rem;
            float: right;
        }
    </style>

    <title>Registro de Ventas</title>
</head>

<body class="bg-light container">
    <!--clase del color del body-->
    <header>
        <b>
            <h1 class=" title text-center ">HELADERIA S.A</h1>
        </b>
    </header>
    <br>
    <a href="options.php"><input class="back btn btn-warning " type="button" value="Regresar al Menú Principal"></a>
    <h2 class="mt-none display-4 text-danger">Registro de Ventas</h2>
    <hr>

    <main>
        <section class="row">
            <!--<button id="dolar" type="button"> Click</button>-->
            <div class="col-12 date">
                <div class="card">
                    <div class="card-header"></div>


                    <div class="card-body">
                        <form class="row" id="formtimedate" style="margin-left: 4rem;">

                            <div class="form-group col-md-4 ">
                                <b><label for="">Hora:</label></b>
                                <input id="hora" type="time" class="form-control" value="<?php echo date("H:i"); ?>" disabled>



                            </div>

                            <div class="form-group col-md-6 ">
                                <b><label for="">Fecha:</label></b>
                                <input id="fecha" type="date" class="form-control" value="<?= $fecha_actual ?>" disabled>

                            </div>





                        </form>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Cliente</h3>
                    </div>
                    <div class="card-body">
                        <form class="row" id="formCliente">

                            <div class="form-group col-md-3">
                                <b><label for="">Usuario:</label></b>
                                <input id="usuario" type="text" class="form-control" value="<?php echo utf8_decode($row['usuario']); ?>" disabled>

                            </div>
                            <button style="margin-top: 22px;" id="btncliente" class="btn btn-primary form-group col-md-1" type="submit">Cedula</button>
                            <button style="margin-top: 22px; margin-left: 10px;" id="btnfinal" class="btn btn-primary form-group col-md-2" type="submit">Consumidor Final</button>
                            <div id="consumidordatos" style="display: none;">
                                <div class="form-group col-md-3">
                                    <b><label for="">Nombre del Cliente:</label></b>
                                    <input id="cliente" type="text" class="form-control" required>

                                </div>

                                <div class="form-group col-md-3">
                                    <b><label for="">CI:</label></b>
                                    <input id="ci" type="text" class="form-control" required>

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Producto</h3>
                    </div>
                    <div class="card-body">
                        <form class="row" id="formDatos">



                            <div class="form-group col-md-3">
                                <b><label for="">Seleccione un producto:</label></b>
                                <select id="selectProduct" class="form-control" required>

                                </select>

                            </div>


                            <div class="form-group col-md-1">
                                <b><label for="">Cantidad</label></b>
                                <input type="number" id="inputCantidad" min="0" class="form-control origenDato" max="20" required>
                            </div>


                            <div class="form-group col-md-3">
                                <b><label for="">Descripción:</label></b>
                                <select id="selectDescripcion" class="form-control" disabled>


                                </select>
                            </div>




                            <div class="form-group col-md-2">
                                <b><label for="">P.Unitario</label></b>
                                <select id="inputunitario" class="form-control" disabled></select>



                            </div>

                            <div class="form-group col-md-2">
                                <b><label for="">P.Total</label></b>
                                <input type="number" id="inputtotal" class="form-control" disabled>
                            </div>

                            <div class="form-group col-md-1 contenedor-boton">
                                <button style="margin-top: 22px;" id="btnañadir" class="btn btn-primary" type="submit">Añadir</button>


                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </section>

        <section class="row mt-4">
            <div class="col">

                <table class="table text-center">
                    <thead style="background: #3d7ba8; color: #fff;">

                        <tr>
                            <th>Producto</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>P. Unitario</th>
                            <th>P. Total</th>
                            
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody  id="tbody">
                        <!-- Aqui se agregan los inputs dinamicos !-->
                    </tbody>

                </table>

            </div>

        </section>


        <br>
        <section>
            <form id="formTotales">

                <tfoot>

                    <div class="row">
                        
                        <div style="display: flex; float:right; ">


                            <div class="col-lg-7" style="margin-left: 25px;">
                                <h3>Notas: </h3>
                                <div class="form-group">
                                    <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Comentarios o sugerencias"></textarea>
                                </div>
                                <br>


                            </div>
                            <div class="row" style="margin-left:10rem;">
                                <span class="form-inline ">
                                    <div class="form-group">
                                        <label>Subtotal: &nbsp;</label>
                                        <div class="input-group">
                                            <input type="text" id="subtotal" class="form-control" onchange="calcularFactura(); calculoIva();">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label>Iva 12% &nbsp;</label>
                                        <div class="input-group">
                                            <input type="text" id="iva" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Total: &nbsp;</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="totalfact" id="totalfact" disabled>
                                        </div>
                                    </div>


                                </span>
                            </div>
                        </div>
                    </div>

                </tfoot>
            </form>







        </section>

        <div class="col mt-4">
            <a><button class="btn btn-dark btn-lg close-sale" id="btnguardar">Cerrar Venta</button></a>

        </div>
    </main>

    <div class="container">

        <br>
        <hr>
        <footer id="footer">
            <br>HELADERIA S.A.<br>
            ¿Quienes Somos?-Términos y condiciones-Contacto-Políticas<br><br>
        </footer>
    </div>
</body>

</html>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<script src="./js/datosproductfactura.js?v=<?= $rand ?>"></script>
<script src="./js/facturaprueba.js?v=<?= $rand ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>

