<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
}

?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">

    <title>Nuevo Producto</title>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type='text/javascript' src="js/jquery-1.7.1.min.js">
    </script>
    <script src="/your/path/to/jquery-mask.js"></script>
    <script type="text/javascript">
        //Metodo para que registre dos decimales ej 0.00
        $(document).ready(function() {
            $(".floatNumberField").change(function() {
                $(this).val(parseFloat($(this).val()).toFixed(2));
            });
        });
    </script>

    <style>
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

        .prevPhoto {
            display: flex;
            justify-content: space-between;
            width: 160px;
            height: 150px;
            border: 1px solid #CCC;
            position: relative;
            cursor: pointer;
            background: url(../images/uploads/user.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            margin: auto;
        }

        .prevPhoto label {
            cursor: pointer;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
        }

        .prevPhoto img {
            width: 100%;
            height: 100%;
        }

        .upimg,
        .notBlock {
            display: none !important;
        }

        .errorArchivo {
            font-size: 16px;
            font-family: arial;
            color: #cc0000;
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .delPhoto {
            color: #FFF;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            background: red;
            position: absolute;
            right: -10px;
            top: -10px;
            z-index: 10;
        }

        #tbl_list_productos img {
            width: 50px;
        }

        .imgProductoDelete {
            width: 175px;
        }

        .formulario {
            margin-left: 6rem;
        }
    </style>
</head>

<body class="container">

    <header>
        <b>
            <h1 class="title">HELADERIA S.A</h1>
        </b>
    </header>



    <br>
    <h2>Registro de Productos</h2>





    <div class="container">
        <hr>

        <section class="main row">
            <article class="col-md-4">
            </article>

            <article class="col-md-4">
                <div class="card" style="width: 28rem;">
                    <div class="card-body" style="text-align:center;">
                        <h5 class="card-title" id="centrar">REGISTRAR PRODUCTO</h5>



                        <form action="nuevoproducto.php" method="POST" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-5 formulario">
                                    <label for="producto">Nombre</label>
                                    <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" name="nombre" maxlength="40" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5 formulario">
                                    <label for="descripcion">Descripcion</label><br>
                                    <label for="">Seleccione un Sabor:</label>
                                    <select id="sabores" class="form-control"></select>
                                </div>

                                <button class="btn btn-success " type="button" id="btnsabores" style="margin-top:67px;height: 30px;">+</button>

                                <div class="form-group col-md-5 formulario">
                                    <br><label for="">Seleccione un Tooping:</label>
                                    <select id="topping" class="form-control"></select>

                                </div>
                                <button class="btn btn-success " type="button" id="btntopping" style="margin-bottom:1rem; margin-top:58px; height: 30px;">+</button>

                                <br><br><input type="text" id="catalogos" class="form-control" name="descripcion" readonly="readonly" style="margin-left:45px;width: 20rem;" required>
                                <input type="button" id="borrar" value="Eliminar">



                            </div>




                            <div class="form-row">
                                <div class="form-group col-md-6 formulario">
                                    <label for="precio">Precio</label>
                                    <input onkeyup="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');" class="floatNumberField form-control" type="text" placeholder='0,00' name="precio" required>
                                </div>
                            </div>


                            <div class="photo ">
                                <input type="file" id="image" name="image" required>

                                <div id="form_alert"></div>
                            </div>




                            <input style="margin-top: 20px;" type="submit" class="btn btn-primary" value="Añadir Producto"></input>
                            <a href="precios.php"><input style="margin-top: 20px;" class="btn btn-danger " type="button" value="Cancelar"></a>
                        </form>





                    </div>

                </div>
            </article>


        </section>
    </div>

    <div class="container">
        <br>
        <hr>
        <footer id="footer">
            <br>HELADERIA S.A.<br> ¿Quienes Somos?-Términos y condiciones-Contacto-Políticas<br><br>
        </footer>
    </div>


    <script src="./js/description_product.js"></script>
    <script src="./js/FotoNewProduct.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>



</body>

</html>

<script type="text/javascript">
    //function enviartexto(x){ agrega los value de las opciones sumadas con un (+) por cada opcion elegida
    // var texto = document.getElementById('sabores').value;
    //document.getElementById ('catalogos').value=(texto=='') ? x : texto+'+'+x;
    //}

    //function mostrarValor(x){   agrega los value de las opciones sumadas con un (+) por cada opcion elegida

    //valorActual = document.getElementById('catalogos').value;
    //document.getElementById('catalogos').value=(valorActual=='') ? x : valorActual+'+'+x;
    // }
    $(function() {
        $('#btnsabores').click(function() {
            if (document.getElementById('catalogos').value !== '') {
                document.getElementById('catalogos').value += ' + ' + $('select[id="sabores"] option:selected').text();
            } else {
                document.getElementById('catalogos').value += $('select[id="sabores"] option:selected').text();
            }
        });
    });
    $(function() {
        $('#btntopping').click(function() {
            if (document.getElementById('catalogos').value !== '') {
                document.getElementById('catalogos').value += ' + ' + $('select[id="topping"] option:selected').text();
            } else {
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