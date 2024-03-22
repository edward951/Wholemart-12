<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
    <title>Registrar producto</title>
</head>

<body>
    <?php
    //  session_start();
    $activo = $_SESSION['activo'] ? $_SESSION['activo'] : '';
    if ($activo == '') {
    ?>
        <script type="text/javascript" language="JavaScript">
            // si el usuario coincide con el de la base valida el rol para decidir a que ventana lo dirige como es administrador lo dirige  a esta ruta que corresponde a la principal que tiene todos los poderes
            window.location = '/wholemart1.2/index.html';
        </script>
    <?php
    } else {
    ?>
        <?php
        //session_start();
        //require "conexion.php";
        include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
        extract($_REQUEST);

        if (!isset($_REQUEST['x'])) {
            $x = 0;
        }

        // $objConexion = conexion();

        $sql = "SELECT inv.INVENTARIO_ID_PRODUCTO, prod.PRODUCTO_NOMBRE_PRODUCTO, inv.INVENTARIO_CANTIDAD_INVENTARIO, inv.INVENTARIO_VALOR_UNITARIO_VENTA FROM `inventario` inv
        INNER JOIN producto prod ON(inv.INVENTARIO_ID_PRODUCTO= prod.ID_PRODUCTO);";
        $resultSet = mysqli_query($conexion, $sql);
        //$row = mysqli_fetch_assoc($resultSet);

        //$resultado = $objConexion->query($sql);

        ?>
        <!-- Formularios Ingresar nuevo producto -->
        <div class="container mt-5">
            <nav class="navbar bg-body-tertiary" style="background-color: #8c6e8c;">
                <div class="container-fluid">
                    <P class="text-center fs-1" style="color: white;">
                        INVENTARIO
                    </P>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        
                        <a href="langing_page.php"><button class="btn btn-success me-md-2" style="background-color: #9d067a;"  type="button">VOLVER</button></a>
                    </div>



                </div>
            </nav>
            <div class="container-5">
                <table class="table table-dark table-striped-columns">
                    <thead>
                        <tr>
                            <th scope="col">ID PRODUCTO</th>
                            <th scope="col">NOMBRE </th>
                            <th scope="col">CANTIDAD ACTUAL</th>
                            <th scope="col">VALOR UNITARIO VENTA</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultSet)) {
                        ?>
                            <tr>
                                <td> <?php echo $row['INVENTARIO_ID_PRODUCTO'] ?> </td>
                                <td> <?php echo $row['PRODUCTO_NOMBRE_PRODUCTO'] ?></td>
                                <td> <?php echo $row['INVENTARIO_CANTIDAD_INVENTARIO'] ?></td>
                                <td> <?php echo $row['INVENTARIO_VALOR_UNITARIO_VENTA'] ?></td>
                             


                            </tr>
                        <?php
                        }
                        //include("eliminarEmpleado.php");
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!--Creación del Footer-->
        <footer>
            <div class="containerFooter">
                <div class="boxFooter">
                    <div class="logo">
                        <img src="images/logo-footer.svg" class="logo">
                    </div>
                    <div class="derechosReservados">
                        <hr>
                        <p>Derechos de autor © <span id="añoFooter"></span> Todos los derechos reservados<b> Wholemart</b></p>
                    </div>
                </div>
                <div class="boxFooter">
                    <a href="https://www.facebook.com/edward.fonsek.9/"><i class="fa-brands fa-facebook"></i>Facebook</a>
                    <a href="https://www.instagram.com/andres_fonseca28/"><i class="fa-brands fa-instagram"></i>Instagram</a>
                    <a href="https://www.twitch.tv/ilm_reddragon"><i class="fa-brands fa-twitter"></i>Twitter</a>
                </div>
            </div>

            <script>
                // Obtener el elemento del footer donde se mostrará el año
                var añoFooter = document.getElementById("añoFooter");

                // Obtener el año actual
                var añoActual = new Date().getFullYear();

                // Mostrar el año en el footer
                añoFooter.textContent = añoActual;
            </script>
        </footer>
        <script src="js/boton_menu.js"></script>
    <?php
    }
    ?>
</body>

</html>