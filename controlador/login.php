<?php
session_start();

include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";

if (isset($_POST['enviar'])) {
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Encriptar la contraseña ingresada por el usuario
    $hashed_password = hash('sha256', $password);

    $sql = "SELECT * FROM usuario WHERE USUARIO_NUMERO_DOCUMENTO = '$usuario'";
    $resultSet = mysqli_query($conexion, $sql);

    if ($resultSet) {
        $row = mysqli_fetch_assoc($resultSet);
        if ($row) {
            // Verificar si la contraseña encriptada coincide con la almacenada en la base de datos
            if ($row['USUARIO_CONTRASENA'] === $hashed_password) {
                // Contraseña correcta, establecer las variables de sesión
                $_SESSION['USUARIO_NOMBRE'] = $row['USUARIO_NOMBRE'];
                $_SESSION['ID_USUARIO'] = $row['ID_USUARIO'];
                $_SESSION['activo'] = '1';

                // Redirigir al usuario según su rol
                $rol = $row['USUARIO_ID_ROL'];
                if ($rol == '1') {
                    header("Location: /wholemart1.2/View/langing_page.php");
                    exit;
                } elseif ($rol == '2') {
                    header("Location: /wholemart1.2/View/bodega.php");
                    exit;
                } else {
                    echo '<div class="alert alert-info" role="alert">NO ERES ADMINISTRADOR(A).</div>';
                }
            } else {
                // Contraseña incorrecta
                header("Location: /wholemart1.2/View/ALERTAS.html");
                exit;
            }
        } else {
            // Usuario no encontrado
            echo '<div class="alert alert-info" role="alert">Usuario no encontrado.</div>';
        }
    } else {
        // Error en la consulta SQL
        echo '<div class="alert alert-danger" role="alert">Error en la consulta SQL.</div>';
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
