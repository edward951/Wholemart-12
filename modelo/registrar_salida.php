 <?php
    session_start();
    $id_usuario = $_SESSION['ID_USUARIO'] ?? '';
    date_default_timezone_set('America/Bogota');
    $dateAndTime2 = date('Y-m-d h:i:s', time());
    
    // Ajustar la ruta del archivo de conexión según la estructura de tu proyecto
    include_once "../controlador/conexion1.php";
    
    // Verifica que la conexión se haya establecido correctamente
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Obtener valores de solicitud
    $idProducto = $_REQUEST['producto'] ?? '';
    $cliente = $_REQUEST['cliente'] ?? '';
    $cantidadVenta =$_REQUEST['cantidad'] ?? '';

    //valida si existe el id producto
    $sqlConsulta = "SELECT * FROM producto WHERE ID_PRODUCTO = ?";
    $stmt = mysqli_prepare($conexion, $sqlConsulta);
    if ($stmt === false){
        echo "Error", 
        die("Error en la preparación de la consulta SQL: " . mysqli_error($conexion));
    }
    mysqli_stmt_bind_param($stmt, 's', $idProducto);
    mysqli_stmt_execute($stmt);

    $resulSetConsulta = mysqli_stmt_get_result($stmt);
    $rowConsulta = mysqli_fetch_assoc($resultSetconsulta);


    if ($rowConsulta) { // si hay resultados inserta en la tabla entrada 1.

        $sqlconsultainv = "SELECT * FROM `inventario` WHERE `INVENTARIO_ID_PRODUCTO`='$idproducto'";
        $resultSetconsultainv = mysqli_query($conexion, $sqlconsultainv);
        $rowconsultainv = mysqli_fetch_assoc($resultSetconsultainv);

        $valorventaproducto = $rowconsultainv['INVENTARIO_VALOR_UNITARIO_VENTA'];
        $valortotalventa = $valorventaproducto * $cantidadventa;
        if ($rowconsultainv) {
            $sqlventa = "INSERT INTO `venta`(`VENTA_FECHA_VENTA`, `VENTA_ID_ESTADO`, `VENTA_ID_CLIENTE`, `VENTA_ID_USUARIO`, `VENTA_ID_PRODUCTO`, `CANTIDAD_VENDIDA`, `VALOR_UNITARIO`, `VALOR_TOTAL`) 
            VALUES ('$dateAndTime2', '1', '$cliente', '$id_usuario', '$idproducto', '$cantidadventa', '$valorventaproducto', '$valortotalventa')";
            $resultSetventa = mysqli_query($conexion, $sqlventa);
            if ($resultSetventa) { //2.

                $cantidadinvinicial = $rowconsultainv['INVENTARIO_CANTIDAD_INVENTARIO'];
                $cantidadinvfina = $cantidadinvinicial - $cantidadventa;


                $query = "UPDATE inventario SET `INVENTARIO_CANTIDAD_INVENTARIO` ='$cantidadinvfina'  WHERE `INVENTARIO_ID_PRODUCTO`='$idproducto'";
                $resultupdateinv = mysqli_query($conexion, $query);
                if ($resultupdateinv) { //3.1 SE ACTUALIZA INVENTARIO
                    include_once "../view/alertausuario.php";
                    echo alertainventarioactualizadook();
                    echo alertaingresonuevaventa();
    ?>
                 <!-- <div class="alert alert-info" role="alert">
                        INVENTARIO ACTUALIZADO PARA EL ID: .<?php //echo $idproducto 
                                                            ?>
                    </div>-->
             <?php

                } else { //3.1
                    include_once "../view/alertausuario.php";
                    echo alertainventarioactualizadoerror();
                ?>
                 <!--<div class="alert alert-danger" role="alert">
                     INVENTARIO NO ACTUALIZADO PARA EL ID: .<?php //echo $idproducto ?>
                 </div>-->
             <?php
                }
                include_once "../view/alertausuario.php";
                echo alertaventaok();
                echo alertaingresonuevaventa();
                ?>
                
             <!--<div class="alert alert-info" role="alert">
                 VENTA INGRESADA PARA EL ID: .<?php //echo $idproducto ?>
             </div>-->
         <?php
            } else { // 2.
                include_once "../view/alertausuario.php";
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