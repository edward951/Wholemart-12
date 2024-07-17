<?php
// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST['login'])) {
    // Incluir el archivo de conexión a la base de datos
    include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";

    // Obtener el número de documento y la contraseña enviados desde el formulario
    $numdoc = $_POST['numero_documento'];
    $password = $_POST['password'];

    // Consulta SQL para obtener la contraseña almacenada asociada al número de documento dado
    $sql = "SELECT USUARIO_NUMERO_DOCUMENTO, USUARIO_CONTRASENA FROM usuario WHERE USUARIO_NUMERO_DOCUMENTO = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $numdoc);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si se encontró un usuario con el número de documento dado
    if ($stmt->num_rows == 1) {
        // Vincular el resultado de la consulta
        $stmt->bind_result($numdoc_db, $hashed_password);
        $stmt->fetch();

        // Verificar si el número de documento ingresado coincide con el almacenado
        // y si la contraseña ingresada coincide con la contraseña almacenada (con hash)
        if ($numdoc == $numdoc_db && password_verify($password, $hashed_password)) {
            // Credenciales correctas, iniciar sesión
            // Aquí podrías establecer las sesiones, redireccionar al usuario, etc.
            echo "Inicio de sesión exitoso";
        } else {
            // Credenciales incorrectas
            echo "Credenciales incorrectas";
        }
    } else {
        // No se encontró un usuario con el número de documento dado
        echo "Usuario no encontrado";
    }

    // Cerrar la consulta y la conexión a la base de datos
    $stmt->close();
    $conexion->close();
}
?>

<?php
if (isset($_REQUEST['insertar'])) {
    include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";

    // Validar datos
    $tipodoc = isset($_REQUEST['tipoDocumento']) ? $_REQUEST['tipoDocumento'] : '';
    $numdoc = isset($_REQUEST['numero_documento']) ? $_REQUEST['numero_documento'] : '';
    $nombreusuario = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
    $apellidousuario = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : '';
    $correo = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $password = isset($_REQUEST['passwordone']) ? $_REQUEST['passwordone'] : '';
    $rol = isset($_REQUEST['rol']) ? $_REQUEST['rol'] : '';

    if (empty($tipodoc) || empty($numdoc) || empty($nombreusuario) || empty($apellidousuario) || empty($correo) || empty($password) || empty($rol)) {
        echo "Por favor, complete todos los campos.";
        exit;
    }

    // Hash de la contraseña usando SHA-256
    $hashed_password = hash('sha256', $password);

    // Preparar la consulta
    $sql = "INSERT INTO usuario (USUARIO_TIPO_DOCUMENTO, USUARIO_NUMERO_DOCUMENTO, USUARIO_NOMBRE, USUARIO_APELLIDO, USUARIO_CORREO_ELECTRONICO, USUARIO_CONTRASENA, USUARIO_ID_ESTADO, USUARIO_ID_ROL) 
            VALUES (?, ?, ?, ?, ?, ?, 1, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssi", $tipodoc, $numdoc, $nombreusuario, $apellidousuario, $correo, $hashed_password, $rol);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        include_once "C:/wamp64/www/wholemart1.2/view/alertausuario.php";
        echo alertaingresousuario();
    } else {
        echo "Error al insertar el usuario: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
} elseif (isset($_REQUEST['login'])) {
    include_once "C:/wamp64/www/wholemart1.2/controlador/conexion1.php";

    // Obtener los datos de inicio de sesión del usuario
    $correo = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

    if (empty($correo) || empty($password)) {
        echo "Por favor, complete todos los campos.";
        exit;
    }

    // Obtener la contraseña almacenada en la base de datos para el correo electrónico dado
    $sql = "SELECT USUARIO_CONTRASENA FROM usuario WHERE USUARIO_CORREO_ELECTRONICO = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_password);
        $stmt->fetch();

        // Verificar si la contraseña ingresada coincide con la contraseña almacenada
        if (hash('sha256', $password) === $stored_password) {
            echo "Inicio de sesión exitoso. ¡Bienvenido!";
            // Aquí puedes redirigir al usuario a la página de inicio o realizar otras acciones
        } else {
            echo "Correo electrónico o contraseña incorrectos.";
        }
    } else {
        echo "Correo electrónico no encontrado.";
    }

    $stmt->close();
    $conexion->close();
}
?>
