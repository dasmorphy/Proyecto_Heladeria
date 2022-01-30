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
            .back{
                background-color: rgb(56, 121, 196);
                border-radius: 8px;
                width: 10%;
                text-align: center;
                text-decoration: none;
                display: flex;
                float: right;
                color: #fff;
                font-size: 100%;
                
            }
            </style>
                
    
</head>
<body class= "container">


    <header>
        <b><h1 class="title">HELADERIA S.A</h1></b>
    </header>
    <br>
    
    <br>
    <br>
    <h2>Mantenimiento de Catálogos</h2>

    <br>
    


    
    <section>
       
        <br>
        <form action="procesar-actualizar.php" method="POST">
            <table>


                <tr>
                    
                    <th>Tipo de Catálogo</th>
                    <th>Descripción</th>
                    <th>Código</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                <select name="IDTABLA">
                <?php
                    $id= $_GET  ["id"];
                    $sql="SELECT * from mantenimiento_catalogo WHERE id_catalogo = '$id'";
                    $result=mysqli_query($conexion,$sql);
                    
                    while($mostrar=mysqli_fetch_array($result)){
                        echo "<option value=".$mostrar['id'].">".$mostrar['IDTABLA']."</option>";
                ?>
                </select>
                <tr>
                    
                    <input type="hidden"value="<?php echo $mostrar['id_catalogo']?>" name="id_catalogo"></input>
                   
                
                    <td>
                        <select name="IDTABLA">
                            
                            <option> <?php echo $mostrar['IDTABLA']?></option>
                          
                        </select>
                        
                    </td>
                    
                    <td>
                        <input oninput="this.value = this.value.toUpperCase()" value="<?php echo $mostrar['DESCRIPCION']?>" name="DESCRIPCION" maxlength="30" required></input>
                    </td>
                    <td>
                        <input oninput="this.value = this.value.toUpperCase()" value="<?php echo $mostrar['CODIGO']?>" name="CODIGO" maxlength="3" required></input>
                    </td>
                    <td>
                        <select name="ESTADO">
                            
                            <option> <?php echo $mostrar['ESTADO']?></option>
                          
                        </select>
                    </td>
                    <td>
                        <input class= "btn btn-success " type="submit" value="Actualizar">
                        <a href= "catalogos.php"><input class= "btn btn-danger" type="button"  value="Cancelar"></a>
                    </td>
                    
                </tr>

                <?php
                }

                ?>
            </table>
        </form>
    </section>

  
</body>
</html>