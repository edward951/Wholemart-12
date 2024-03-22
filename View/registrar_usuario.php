<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;800;900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_registro_usuario.css">
    <script src="https://kit.fontawesome.com/229a386a5d.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logoico2.ico">
</head>
<body>
    <main>
 <!-- Formularios Registro nuevo usuario -->
        <div class="box">
            <form class="formularioRegister" action="/wholemart1.2/modelo/insertar_usuario.php" method="POST">
                <img class="logoLogin" src="images/logoLogin.svg" alt="">
                    <h2>Registrar usuario</h2>
                        <div class="inputBox">
                            <label class="tipoDocumento" for="tipoDocumento">Tipo de documento</label>
                                <select class="select" id="tipoDocumento" name="tipoDocumento">
                                    <option value="1">Cedula de ciudadania</option>
                                    <option value="2">Cedula extranjera</option>
                                    <option value="3">NIT</option>
                                </select>
                            <i class="fa-solid fa-id-card"></i>
                            <label for="documento">N° identificación</label>
                            <input id="numero_documento" name="numero_documento" type="text" placeholder="Enter N° identification" pattern="[0-9]{6,12}" title="Solo recibe datos numericos mínimo de 6 digitos y máximo de 12." maxlength="12"  required>
                            <i class="fa-solid fa-user"></i>
                            <label for="Nombre">Nombres</label>
                            <input id="nombre" name="nombre" type="text" placeholder="Enter firtsname" maxlength="40" required>
                            <i class="fa-sharp fa-solid fa-user"></i>
                            <label for="Usuario">Apellidos</label>
                            <input id="apellido" name="apellido" type="text" placeholder="Enter lastname" maxlength="40" required>
                            <i class="fa-solid fa-envelope"></i>
                            <label for="Correo">Correo electrónico</label>
                            <input id="email" name="email" type="email" placeholder="Ejp123@wholemart.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title= "Debe contener mínimo un @ y un punto." maxlength="45" required>
                            <i class="fa-solid fa-lock"></i>
                            <label for="Contraseña">Contraseña</label>
                            <input id="passwordone" name="passwordone" type="password" placeholder="Enter the password"  title="Debe contener al menos 5 caracteres"  title="Debe contener al menos un n." maxlength="20" required>
                            
                            <label class="rol" for="rol">Rol</label>
                                <select class="select" id="rol" name="rol">
                                    <option value="1">Administrador</option>
                                    <option value="2">Bodega</option>
                                </select>
                        </div>
                        <div class="btn">
                        <button type="submit" class="btn btn-primary" name="insertar">GUARDAR</button>
                        </div>
               <!-- <div class="btn">
                    <input type="submit" value="REGISTRAR USUARIO">
                </div>-->
                
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


</html>