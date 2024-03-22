 <?php
    session_start();
    $id_usuario = $_SESSION['ID_USUARIO'];
    /// insertar nueva entrada de compra
    date_default_timezone_set('America/Bogota');
    $DateAndTime2 = date('Y-m-d h:i:s ', time());
    echo $DateAndTime2;
    include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";

    $idproducto = isset($_REQUEST['producto']) ? $_REQUEST['producto'] : '';
    //$estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : '';
    $cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : '';


    $cantidadventa = isset($_REQUEST['cantidad']) ? $_REQUEST['cantidad'] : '';

    //valida si existe el id producto
    $sqlconsulta = "SELECT * FROM `producto` WHERE `ID_PRODUCTO`='$idproducto'";
    $resultSetconsulta = mysqli_query($conexion, $sqlconsulta);
    $rowconsulta = mysqli_fetch_assoc($resultSetconsulta);

    if ($rowconsulta) { // si hay resultados inserta en la tabla entrada 1.


        $sqlconsultainv = "SELECT * FROM `inventario` WHERE `INVENTARIO_ID_PRODUCTO`='$idproducto'";
        $resultSetconsultainv = mysqli_query($conexion, $sqlconsultainv);
        $rowconsultainv = mysqli_fetch_assoc($resultSetconsultainv);

        $valorventaproducto = $rowconsultainv['INVENTARIO_VALOR_UNITARIO_VENTA'];
        $valortotalventa = $valorventaproducto * $cantidadventa;
        if ($rowconsultainv) {
            $sqlventa = "INSERT INTO `venta`(`VENTA_FECHA_VENTA`, `VENTA_ID_ESTADO`, `VENTA_ID_CLIENTE`, `VENTA_ID_USUARIO`, `VENTA_ID_PRODUCTO`, `CANTIDAD_VENDIDA`, `VALOR_UNITARIO`, `VALOR_TOTAL`) 
            VALUES ('$DateAndTime2', '1', '$cliente', '$id_usuario', '$idproducto', '$cantidadventa', '$valorventaproducto', '$valortotalventa')";
            $resultSetventa = mysqli_query($conexion, $sqlventa);
            if ($resultSetventa) { //2.

                $cantidadinvinicial = $rowconsultainv['INVENTARIO_CANTIDAD_INVENTARIO'];
                $cantidadinvfina = $cantidadinvinicial - $cantidadventa;


                $query = "UPDATE inventario SET `INVENTARIO_CANTIDAD_INVENTARIO` ='$cantidadinvfina'  WHERE `INVENTARIO_ID_PRODUCTO`='$idproducto'";
                $resultupdateinv = mysqli_query($conexion, $query);
                if ($resultupdateinv) { //3.1 SE ACTUALIZA INVENTARIO
                    include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
                    echo alertainventarioactualizadook();
                    echo alertaingresonuevaventa();
    ?>
                 <!-- <div class="alert alert-info" role="alert">
                        INVENTARIO ACTUALIZADO PARA EL ID: .<?php //echo $idproducto 
                                                            ?>
                    </div>-->
             <?php

                } else { //3.1
                    include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
                    echo alertainventarioactualizadoerror();
                ?>
                 <!--<div class="alert alert-danger" role="alert">
                     INVENTARIO NO ACTUALIZADO PARA EL ID: .<?php //echo $idproducto ?>
                 </div>-->
             <?php
                }
                include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
                echo alertaventaok();
                echo alertaingresonuevaventa();
                ?>
                
             <!--<div class="alert alert-info" role="alert">
                 VENTA INGRESADA PARA EL ID: .<?php //echo $idproducto ?>
             </div>-->
         <?php
            } else { // 2.
                include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
                echo alertaventaerror();
                
            ?>

             <!--<div class="alert alert-danger" role="alert">
                 ERROR AL GUARDAR VENTA, NO HAY INVENTARIO
             </div>-->



     <?php
            }
        }
    } else { //FIN VALIDACION PRODUCTO 1.
        include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
                echo alertaproductonoexiste();
        ?>

     <!--<div class="alert alert-danger" role="alert">
         NO EXISTE PRODUCTO
     </div>-->



 <?php
    }

    ?>