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
$proveedor = $_REQUEST['proveedor'] ?? '';
$cantidadCompra = $_REQUEST['cantidadcompra'] ?? '';

// Validar si existe el producto
$sqlConsulta = "SELECT * FROM producto WHERE ID_PRODUCTO = ?";
$stmt = mysqli_prepare($conexion, $sqlConsulta);
if ($stmt === false) {
    die("Error en la preparación de la consulta SQL: " . mysqli_error($conexion));
}
mysqli_stmt_bind_param($stmt, 's', $idProducto);
mysqli_stmt_execute($stmt);
$resultSetConsulta = mysqli_stmt_get_result($stmt);
$rowConsulta = mysqli_fetch_assoc($resultSetConsulta);

if ($rowConsulta) {
    // Producto encontrado
    $valorCompraProducto = $rowConsulta['PRODUCTO_VALOR_UNITARIO_COMPRA'];

    // Insertar entrada de compra
    $sqlCompra = "INSERT INTO entrada_compra (ENTRADA_COMPRA_FECHA, ENTRADA_COMPRA_CANTIDAD, ENTRADA_COMPRA_ID_PRODUCTO, ENTRADA_COMPRA_ID_PROVEEDOR) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sqlCompra);
    if ($stmt === false) {
        die("Error en la preparación de la consulta SQL: " . mysqli_error($conexion));
    }
    mysqli_stmt_bind_param($stmt, 'ssss', $dateAndTime2, $cantidadCompra, $idProducto, $proveedor);
    $resultSetCompra = mysqli_stmt_execute($stmt);

    if ($resultSetCompra) {
        include_once "../view/alertausuario.php";
        echo alertaentradacompraok();

        // Validar si existe el id producto en el inventario
        $sqlConsultaInv = "SELECT * FROM inventario WHERE INVENTARIO_ID_PRODUCTO = ?";
        $stmt = mysqli_prepare($conexion, $sqlConsultaInv);
        if ($stmt === false) {
            die("Error en la preparación de la consulta SQL: " . mysqli_error($conexion));
        }
        mysqli_stmt_bind_param($stmt, 's', $idProducto);
        mysqli_stmt_execute($stmt);
        $resultSetConsultaInv = mysqli_stmt_get_result($stmt);
        $rowConsultaInv = mysqli_fetch_assoc($resultSetConsultaInv);

        $valorFinalVenta = ($valorCompraProducto * 0.3) + $valorCompraProducto;

        if ($rowConsultaInv) {
            // Actualizar inventario existente
            $cantidadInvInicial = $rowConsultaInv['INVENTARIO_CANTIDAD_INVENTARIO'];
            $cantidadInvFinal = $cantidadInvInicial + $cantidadCompra;

            $query = "UPDATE inventario SET INVENTARIO_CANTIDAD_INVENTARIO = ?, INVENTARIO_VALOR_UNITARIO_VENTA = ? WHERE INVENTARIO_ID_PRODUCTO = ?";
            $stmt = mysqli_prepare($conexion, $query);
            if ($stmt === false) {
                die("Error en la preparación de la consulta SQL: " . mysqli_error($conexion));
            }
            mysqli_stmt_bind_param($stmt, 'sss', $cantidadInvFinal, $valorFinalVenta, $idProducto);
            $resultUpdateInv = mysqli_stmt_execute($stmt);

            if ($resultUpdateInv) {
                include_once "../view/alertausuario.php";
                echo alertainventarioactualizadook();
                echo alertaingresonuevacompra();
            } else {
                include_once "../view/alertausuario.php";
                echo alertainventarioactualizadoerror();
            }
        } else {
            // Insertar nuevo inventario
            $sqlInsertarInv = "INSERT INTO inventario (INVENTARIO_CANTIDAD_INVENTARIO, INVENTARIO_VALOR_UNITARIO_VENTA, INVENTARIO_ID_PRODUCTO, INVENTARIO_ID_STOCK, INVENTARIO_ID_ENTRADA_COMPRA) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conexion, $sqlInsertarInv);
            if ($stmt === false) {
                die("Error en la preparación de la consulta SQL: " . mysqli_error($conexion));
            }
            mysqli_stmt_bind_param($stmt, 'sssss', $cantidadCompra, $valorFinalVenta, $idProducto, $id_usuario, $resultSetCompra);
            $resultSetInsertInv = mysqli_stmt_execute($stmt);

            if ($resultSetInsertInv) {
                include_once "../view/alertausuario.php";
                echo alertainventarioactualizadook();
                echo alertaingresonuevacompra();
            } else {
                include_once "../view/alertausuario.php";
                echo alertainventarioactualizadoerror();
            }
        }
    } else {
        include_once "../view/alertausuario.php";
        echo alertaentradacompraerror();
    }
} else {
    include_once "../view/alertausuario.php";
    echo alertaproductonoexiste();
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
