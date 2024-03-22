<?php
session_start();
$id_usuario = $_SESSION['ID_USUARIO'];
/// insertar nueva entrada de compra
date_default_timezone_set('America/Bogota');
$DateAndTime2 = date('Y-m-d h:i:s ', time());
echo $DateAndTime2;
include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";

$idproducto = isset($_REQUEST['producto']) ? $_REQUEST['producto'] : '';
$proveedor = isset($_REQUEST['proveedor']) ? $_REQUEST['proveedor'] : '';
$cantidadcompra = isset($_REQUEST['cantidadcompra']) ? $_REQUEST['cantidadcompra'] : '';

//valida si existe el id producto
$sqlconsulta = "SELECT * FROM `producto` WHERE `ID_PRODUCTO`='$idproducto'";
$resultSetconsulta = mysqli_query($conexion, $sqlconsulta);
$rowconsulta = mysqli_fetch_assoc($resultSetconsulta);

if ($rowconsulta) { // si hay resultados inserta en la tabla entrada 1.
    $valorcompraproducto = $rowconsulta['PRODUCTO_VALOR_UNITARIO_COMPRA'];
    $sqlcompra = "INSERT INTO `entrada_compra`(`ENTRADA_COMPRA_FECHA`, `ENTRADA_COMPRA_CANTIDAD`, `ENTRADA_COMPRA_ID_PRODUCTO`, `ENTRADA_COMPRA_ID_PROVEEDOR`) 
    VALUES ('$DateAndTime2','$cantidadcompra','$idproducto','$proveedor')";
    $resultSetcompra = mysqli_query($conexion, $sqlcompra);
    if ($resultSetcompra) { //2.
        include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
        echo alertaentradacompraok();
?>
        <!--<div class="alert alert-info" role="alert">
            ENTRADA DE COMPRA INGRESADA PARA EL ID: .<?php //echo $idproducto 
                                                        ?>
        </div>-->
        <?php

        //valida si existe el id producto en el inventariio
        $sqlconsultainv = "SELECT * FROM `inventario` WHERE `INVENTARIO_ID_PRODUCTO`='$idproducto'";
        $resultSetconsultainv = mysqli_query($conexion, $sqlconsultainv);
        $rowconsultainv = mysqli_fetch_assoc($resultSetconsultainv);


        if ($rowconsultainv) { // 3. si hay resultados, realiza la actualizacion de la cantidad y valor total
            $cantidadinvinicial = $rowconsultainv['INVENTARIO_CANTIDAD_INVENTARIO'];
            $cantidadinvfina = $cantidadinvinicial + $cantidadcompra;

            $valorfinalventa = ($valorcompraproducto * 0.3) + $valorcompraproducto;


            $query = "UPDATE inventario SET `INVENTARIO_CANTIDAD_INVENTARIO` ='$cantidadinvfina', `INVENTARIO_VALOR_UNITARIO_VENTA`='$valorfinalventa'  WHERE `INVENTARIO_ID_PRODUCTO`='$idproducto'";
            $resultupdateinv = mysqli_query($conexion, $query);
            if ($resultupdateinv) { //3.1 SE ACTUALIZA INVENTARIO
                include_once "C:/xampp1/htdocs/wholemart1.2/view/alertausuario.php";
                echo alertainventarioactualizadook();
                echo alertaingresonuevacompra();
                
        ?>
                <!--<div class="alert alert-info" role="alert">
                    INVENTARIO ACTUALIZADO PARA EL ID: .<?php //echo $idproducto 
                                                        ?>
                </div>-->
            <?php

            } else { //3.1
                include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
                echo alertainventarioactualizadoerror();

            ?>
                <!--<div class="alert alert-danger" role="alert">
                    INVENTARIO NO ACTUALIZADO PARA EL ID: .<?php //echo $idproducto 
                                                            ?>
                </div>-->
            <?php
            }
        } else { //3.
            $valorfinalventa = ($valorcompraproducto * 0.3) + $valorcompraproducto;
            $sqlinsertinv = "INSERT INTO `inventario`(`INVENTARIO_CANTIDAD_INVENTARIO`, `INVENTARIO_VALOR_UNITARIO_VENTA`, `INVENTARIO_ID_PRODUCTO`, `INVENTARIO_ID_STOCK`, `INVENTARIO_ID_ENTRADA_COMPRA`)
             VALUES ('$cantidadcompra','$valorfinalventa','$idproducto')";
            $resultSetinsertinv = mysqli_query($conexion, $sqlinsertinv);
            if ($resultSetinsertinv) { //4. SE INSERTA EL INVENATARIO
                include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
                echo alertainventarioactualizadook();
                echo alertaingresonuevacompra();
            ?>
                <!--<div class="alert alert-info" role="alert">
                    INGRESO DE INVENTARIO SATISFACTORIO PARA EL ID: .<?php //echo $idproducto 
                                                                        ?>
                </div>-->
            <?php
            } else {
                include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
                echo alertainventarioactualizadoerror();
            ?>
                <!--<div class="alert alert-danger" role="alert">
                    ERROR EN INGRESO DE INVENTARIO PARA EL ID: .<?php //echo $idproducto 
                                                                ?>
                </div>-->
        <?php
            }
        }



        ?>
        <!--<script type="text/javascript">
           window.location = '/wholemart1.1/View/registrar_usuario.html';
           </script>-->


    <?php
    } else { // 2.
        include_once "C:/xampp1/htdocs/wholemart1.2/view/alertausuario.php";
        echo alertaentradacompraerror();

    ?>

        <!--<div class="alert alert-danger" role="alert">
            ERROR AL GUARDAR ENTRADA.
        </div>-->



    <?php
    }
} else { //FIN VALIDACION PRODUCTO 1.
    include_once "C:/xampp1/htdocs/wholemart1.2/view/alertausuario.php";
    echo alertaproductonoexiste();
    ?>


    <!--<div class="alert alert-danger" role="alert">
        NO EXISTE PRODUCTO
    </div>-->



<?php
}

?>