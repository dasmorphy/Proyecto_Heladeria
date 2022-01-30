
<?php
session_start();
if (!isset($_SESSION['usuario'])){
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
    <link rel="" href="../Modelo/conexion.php">
    <title>Nuevo Catalogo</title>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type='text/javascript' src="js/jquery-1.7.1.min.js">
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
            .formulario{
                margin-left: 6rem;
            }
    </style>
</head>

<body class="container">
    
    <header>
        <b><h1 class="title">HELADERIA S.A</h1></b>
    </header>
    
    
    
    <br>
    <h2>Mantenimiento de Catálogos</h2>

    
    


    <div class="container">
        <hr>

        <section class="main row">
            <article class="col-md-4">
            </article>

            <article class="col-md-4">
                <div class="card" style="width: 25rem;">
                    <div class="card-body" style="text-align:center;">
                        <h5 class="card-title" id="centrar" style="color: blue;"> REGISTRAR</h5>
                       
                        <hr>

                        <form action="nuevocatalogo.php" id="formcatalogo" method="POST" >
                            
                            <div class="form-row">
                                <div class="form-group col-md-6 formulario" >
                                    <label for="catalogo">Tipo de Catálogo</label>
                                    <select  name="catalogo" class="form-control" required >
                                        <option value="" disabled selected>--Seleccione-- </option> 
                                        <option value="HELADO">HELADO</option>
                                        <option value="SABORES">SABORES</option>
                                        <option value="TOPPING">TOPPING</option>

                                    </select>

                                   
                                </div>
                            </div>

                            
                           
                            <div class="form-row">
                                <div class="form-group col-md-6 formulario">
                                    <label for="descripcion">Descripción</label>
                                    <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control"  name="descripcion" placeholder="Descripcion" maxlength="30" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 formulario">
                                    <label for="codigo">Código</label>
                                    <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control"  name="codigo" placeholder="Codigo" maxlength="3" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 formulario">
                                    <label for="estado">Estado</label>
                                    <select  name="estado" class="form-control" >
                                       
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                       

                                    </select>
                                    
                                </div>
                            </div>

                            


                            <input type="submit" id ="añadir" class="btn btn-primary"  value="Añadir Catálogo"></input>
                            <a href="catalogos.php"><input class= "btn btn-danger  " type="button"  value="Cancelar"></a>
                        </form>





                    </div>

                </div>
            </article>

            <article class="col-md-4">
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
</body>

</html>


