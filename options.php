<?php
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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Bienvenido/a</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <style>
        a{
            text-decoration: none;
        }
    </style>

</head>
<script type = "text/javascript">
    function ConfirmDelete(){
        var respuesta = confirm("¿Está seguro que desea cerrar sesión?");
        if (respuesta == true){
            header ("location: index.php");
            return true;
        }
        else{
            return false;
        }
    }

</script>
<!-- background-image: linear-gradient(to right, #74ebd5 0%, #9face6 100%); -->

<body style="background-image: linear-gradient(to right, #92fe9d 0%, #00c9ff 100%);">
    <section>
        <a href="salirsesion.php" onclick="return ConfirmDelete()">Cerrar Sesión</a>
        <div class="text-options">
            <i><h1 style="text-align: center; margin-top: 2rem;  margin-bottom: 6rem; color: rgb(42, 52, 139); font-size: 250%;">Menú de Opciones</h1></i>

        </div>


        <div class="container-options" >
            <div  data-aos="fade-up" data-aos-duration="1000">
                <div class="options" >
                    <a href="catalogos.php"><img style="border-radius: 2rem; width: 15rem;" src="img/mantenimiento.png" alt="mantenimiento"></a>
                    <p>
                        Mantenimiento de Catálogos
                    </p>

                </div>
            </div>
            <div  data-aos="fade-up" data-aos-duration="1500">
                <div class="options two">
                    <a href="precios.php"><img style="border-radius: 2rem; width: 15rem; height: 15rem;" src="img/caja-registradora.png" alt="precios"></a>
                </div>
                <p>
                    Registro de Precios
                </p>
            </div>
            <div  data-aos="fade-up" data-aos-duration="2000">
                <div class="options">
                    <a href="registro-ventas.php"><img style="border-radius: 2rem; width: 15rem; height: 15rem;" src="img/ventas.jpg" alt="ventas"></a>
                    <p>
                        Registro de Ventas
                    </p>
                </div>
            </div>

            <div  data-aos="fade-up" data-aos-duration="2500">
                <div class="options">
                    <a href="consultas-ventas.php"><img style="border-radius: 2rem; width: 15rem;" src="img/consultas-ventas.png" alt="consultas-ventas"></a>
                    <P>Consultas y Datos de Ventas</P>
                </div>
            </div>

        </div>
    </section>

    <script>
        AOS.init();
    </script>

</body>


</html>