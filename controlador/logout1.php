<?php
// Limpiar la sesión
$_SESSION = [];

//Verificar si se usan cookies para la sesión
if (ini_get('session.use_cookies')) {
    // Obtener los parámetros de la cookie de sesión
    $params = session_get_cookie_params();

    // Establecer la cookie de sesión con una fecha de expiración en el pasado para eliminarla
    setcookie(session_name(), '', time() - 42000,
              $params['path'], $params['domain'],
              $params['secure'], $params['httponly']);
}

// Destruir la sesión
session_destroy();

//Redirigir el usuario a la página de inicio
header("Location: /wholemart1.2/login.php");

exit; //Asegurar que el script se detiene después de la redirección
?>