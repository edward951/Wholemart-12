
<?php

/// INSERTAR USUARIO NUEVO
if (isset($_REQUEST['insertar'])) {
    //include_once "conexion.php";
    include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";

    $tipodoc = isset($_REQUEST['tipoDocumento']) ? $_REQUEST['tipoDocumento'] : '';
    $numdoc = isset($_REQUEST['numero_documento']) ? $_REQUEST['numero_documento'] : '';
    $nombreusuario = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
    $apellidousuario = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : '';
    $correo = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $password = isset($_REQUEST['passwordone']) ? $_REQUEST['passwordone'] : '';
    $rol = isset($_REQUEST['rol']) ? $_REQUEST['rol'] : '';


    $sql = "INSERT INTO `usuario`(`USUARIO_TIPO_DOCUMENTO`, `USUARIO_NUMERO_DOCUMENTO`, `USUARIO_NOMBRE`, `USUARIO_APELLIDO`, `USUARIO_CORREO_ELECTRONICO`, `USUARIO_CONTRASENA`, `USUARIO_ID_ESTADO`, `USUARIO_ID_ROL`) 
        VALUES ('$tipodoc','$numdoc','$nombreusuario','$apellidousuario','$correo','$password','1','$rol')";
    $resultSet = mysqli_query($conexion, $sql);
    if ($resultSet) {

        //echo "DATOS GUARDADOS CORRECTAMENTE";

       // include_once "C:/xampp/htdocs/wholemart1.2/view/registrar_usuario.php";
       include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";
       include_once "C:/wamp64/www/wholemart1.2/view/alertausuario.php";
       echo alertaingresousuario();


?>
        <script type="text/javascript">
           
            
            //window.location = '/wholemart1.2/View/alertausuario.html';

            //window.location = '/wholemart1.2/View/registrar_usuario.php';
        </script>

        

    <?php
    } else {
    ?>

        <div class="alert alert-danger" role="alert">
            ERROR AL GUARDAR.
        </div>



<?php
    }
} //fin insertar usuario
?>