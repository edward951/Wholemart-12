<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_database = "wholemart";
$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
if ($conexion == false) {
  
   die("Error de Conexion");
}

?>