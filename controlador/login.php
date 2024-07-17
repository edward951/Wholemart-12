<?php
session_start();

include "conexion1.php";

if (isset($_POST['enviar'])) {

    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    // Encriptar la contraseña ingresada por el usuario
    $hashed_password = hash('sha256', $password);

    $sql = "SELECT * FROM usuario WHERE USUARIO_NUMERO_DOCUMENTO = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    //Enlazar los parametros
    mysqli_stmt_bind_param($stmt, 's', $usuario);
    //Ejecutar la declaración
    mysqli_stmt_execute($stmt);
    //Obtener el resultado
    $resultSet = mysqli_stmt_get_result($stmt);

    if ($resultSet && $row = mysqli_fetch_assoc($resultSet)) {

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
        // Usuario no encontrado o error en la consulta SQL
        if (!$resultSet) {
            echo '<div class= "alert alert-danger" role =alert">Error en la consulta SQL</div';
        } else {
            echo ' <div class="alert alert-info" role="alert">Usuario no encontrado.</div>';
        }
    }

    //Cerrar la declaración
    mysqli_stmt_close($stmt);
}
// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>