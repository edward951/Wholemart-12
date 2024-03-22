<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada inventario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;800;900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_registro_producto.css">
    <link rel="stylesheet" href="css/style_entrada.css">
    <script src="https://kit.fontawesome.com/229a386a5d.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logoico2.ico">
</head>
<body>
<?php
  //  session_start();
  $activo = $_SESSION['activo'] ? $_SESSION['activo'] : '';
  if ($activo == '') {
  ?>
      <script type="text/javascript" language="JavaScript">
          // si el usuario coincide con el de la base valida el rol para decidir a que ventana lo dirige como es administrador lo dirige  a esta ruta que corresponde a la principal que tiene todos los poderes
          window.location = '/wholemart1.2/index.html';
      </script>
  <?php
  } else {
  ?>
 <main>
 <!-- Formularios Ingresar nuevo producto -->
        <div class="box">
            <form class="formularioIngresarProducto" action="/wholemart1.2/modelo/registrar_entrada.php" method="GET">
                <img class="logoLogin" src="images/logoLogin.svg" alt="">
                    <h2>Ingresar entradas</h2>
                        <div class="inputBox">
                            <i class="fa-solid fa-tags"></i>
                            <label for="producto">CÓDIGO PRODUCTO</label>
                            <input id="producto" name="producto" type="text" placeholder="producto" required>
                            <i class="fa-solid fa-tags"></i>
                            <label for="proveedor">CÓDIGO PROVEEDOR</label>
                            <input id="proveedor" name="proveedor" type="text" placeholder="proveedor" required>
                            <i class="fa-sharp fa-solid fa-coins"></i>
                            <label for="cantidadcompra">CANTIDAD A INGRESAR</label>
                            <input id="cantidadcompra" name="cantidadcompra" type="text" placeholder="cantidad compra" maxlength="40" required>
                        </div>
                <!--<div class="btn">
                    <input type="submit" class="btn-primary btn-guardar" name= "guardarproducto" id="guardarproducto" value="INGRESAR PRODUCTO">
                </div>-->
                <div class="btn">
                    <button type="submit" class="btn-primary" name="guardarproducto">GUARDAR</button>
                </div>            
            </form>
        </div>
    </div> 
</main>

<!--Creación del Footer
<footer>
    <div class="containerFooter">
      <div class="boxFooter">
        <div class="logo">
          <img src="images/logo-footer.svg" class="logo">
        </div>
        <div class="derechosReservados">
          <hr>
          <p>Derechos de autor © <span id="añoFooter"></span> Todos los derechos reservados<b> Wholemart</b></p>
        </div>
      </div>
      <div class="boxFooter">
        <a href="https://www.facebook.com/edward.fonsek.9/"><i class="fa-brands fa-facebook"></i>Facebook</a>
        <a href="https://www.instagram.com/andres_fonseca28/"><i class="fa-brands fa-instagram"></i>Instagram</a>
        <a href="https://www.twitch.tv/ilm_reddragon"><i class="fa-brands fa-twitter"></i>Twitter</a>
      </div>
    </div>
  
    <script>
      // Obtener el elemento del footer donde se mostrará el año
      var añoFooter = document.getElementById("añoFooter");
  
      // Obtener el año actual
      var añoActual = new Date().getFullYear();
  
      // Mostrar el año en el footer
      añoFooter.textContent = añoActual;
    </script>
  </footer>-->
<script src="js/boton_menu.js"></script>
<?php
  }
  ?>
</body>
</html>