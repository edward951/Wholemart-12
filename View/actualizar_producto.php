<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar producto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;800;900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_registro_producto.css">
    <script src="https://kit.fontawesome.com/229a386a5d.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logoico2.ico">
</head>
<body>
    <main>
 <!-- Formularios Actualizar producto -->
        <div class="box">
            <form class="formularioIngresarProducto" action="/wholemart1.1/controlador/controller.php" method="GET">
                <img class="logoLogin" src="images/logoLogin.svg" alt="">
                    <h2>Actualizar Producto</h2>
                        <div class="inputBox">
                            <i class="fa-solid fa-tags"></i>
                            <label for="nombre_Producto">Nombre</label>
                            <input id="nombre_Producto" name="nombre_Producto" type="text" placeholder="Product name" required>
                            <i class="fa-solid fa-file-contract"></i>
                            <label class="Description" for="Descripcion">Descripción</label>
                            <input id="Descripcion" name="Descripcion" type="text" placeholder="Description" maxlength="40" required>
                            <i class="fa-sharp fa-solid fa-coins"></i>
                            <label for="ValorUnitario">Valor unitario</label>
                            <input id="ValorUnitario" name="ValorUnitario" type="text" placeholder="Unit value" maxlength="40" required>
                        </div>
                <div class="btn">
                    <button type="submit" class="btn-primary" name="guardarproducto">ACTUALIZAR</button>
                </div>            
            </form>
        </div>
    </div> 
</main>

<!--Creación del Footer-->
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
  </footer>
</body>
<script src="js/boton_menu.js"></script>
</html>