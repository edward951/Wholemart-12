<?php

//include_once "conexion.php";


if (isset($_REQUEST['enviar'])) {
    session_start();

    $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : '';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

    //include_once "conexion.php";
    // include_once "/wholemart/controlador/conexion1.php";
    include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";

    $sql = "SELECT * FROM `usuario` where USUARIO_NUMERO_DOCUMENTO='$usuario' and USUARIO_CONTRASENA ='$password';";
    $resultSet = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($resultSet);
    if ($row) { //if valida si hay resultados en la consulta
        $nombre = $row['USUARIO_NOMBRE']; // guarda en variable el resultado de la consulta
        $id = $row['ID_USUARIO'];
        $rol = $row['USUARIO_ID_ROL'];
        $_SESSION['USUARIO_NOMBRE'] = $row['USUARIO_NOMBRE']; // guardo en la sesion el resultado de la consulta
        $_SESSION['ID_USUARIO'] = $row['ID_USUARIO'];
        $_SESSION['activo'] = '1';
        if ($rol == '1') {
           // header("Location: langing_page.php");

            //require_once "C:/xampp1/htdocs/wholemart1.2/View/langing_page.php";
            //require_once "http://localhost/wholemart1.1/View/langing_page.html";
?>
            <script type="text/javascript" language="JavaScript">
                window.location = '/wholemart1.2/View/langing_page.php';
            </script>
        <?php

        } elseif ($rol == '2') {
            ?>
            <script type="text/javascript" language="JavaScript">
                window.location = '/wholemart1.2/View/bodega.php';
            </script>
            <?php
        } else {
        ?>
            <div class="alert alert-info" role="alert">
                NO ERES ADMINISTRADOR(A).<?php echo $nombre ?>
            </div>
        <?php
        }
    } else {
        
        

        ?>
        <script type="text/javascript" language="JavaScript" >
        window.location = '/wholemart1.2/View/ALERTAS.html';
       
            </script>

<?php


    }
}

?>