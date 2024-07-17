<?php
/// insertar nuevo producto
    include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
   

    $product = isset($_REQUEST['nombre_Producto']) ? $_REQUEST['nombre_Producto'] : '';
    $descripcion = isset($_REQUEST['Descripcion']) ? $_REQUEST['Descripcion'] : '';
    $valor = isset($_REQUEST['ValorUnitario']) ? $_REQUEST['ValorUnitario'] : '';
    


    $sql = "INSERT INTO `producto`(`PRODUCTO_NOMBRE_PRODUCTO`, `PRODUCTO_DESCRIPCION_PRODUCTO`, `PRODUCTO_VALOR_UNITARIO_COMPRA`, `PRODUCTO_ID_ESTADO`) 
        VALUES ('$product','$descripcion','$valor','3')";
    $resultSet = mysqli_query($conexion, $sql);
    if ($resultSet) {

        include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
        include_once "C:/wamp64/www/wholemart1.2/view/alertausuario.php";
        // echo alertaingresproducto();
        echo alertaingresproducto ("hola se guardo correctamente") ;
 
?>

    <?php
    } else {
    ?>

        <div class="alert alert-danger" role="alert">
            ERROR AL GUARDAR.
        </div>

        

<?php
    }
 
?>