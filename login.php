<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/229a386a5d.js" crossorigin="anonymous"></script>
    <link rel="icon" href="View/images/logoico2.ico">
    <title>Wholemart</title>
</head>

<body>
    <main>
        <div class="box">
            <form class="formularioLogin" action="/wholemart1.2/controlador/login.php" method="POST">
                <img class="logoLogin" src="View/images/logoLogin.svg" alt="">
                <h2>Iniciar sesión</h2>
                <div class="inputBox">
                    <i class="fa-solid fa-id-card"></i>
                    <label for="usuario">Usuario</label>
                    <input id="usuario" name="usuario" type="text" title="Ingresa tu cédula o nombre de usuario." pattern="[0-9]+" maxlength="45" required>
                </div>
                <div class="inputBox">
                    <i class="fa-solid fa-lock"></i>
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password"
                        title="Debe contener al menos un número, una letra minúscula, una letra mayúscula, un carácter especial, debe ser mínimo de 8 caracteres y máximo de 20 caracteres."
                        maxlength="20" required>
                </div>
                <div class="btn">
                    <input type="submit" value="INGRESAR" name="enviar">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <div class="containerFooter">
            <div class="boxFooter">
                <div class="logo">
                    <img src="View/images/logo-footer.svg" class="logo">
                </div>
                <div class="derechosReservados">
                    <hr>
                    <p>Derechos de autor © <span id="añoFooter"></span> Todos los derechos reservados <b>Wholemart</b></p>
                </div>
            </div>
            <div class="boxFooter">
                <a href="https://www.facebook.com/edward.fonsek.9/"><i class="fa-brands fa-facebook"></i> Facebook</a>
                <a href="https://www.instagram.com/andres_fonseca28/"><i class="fa-brands fa-instagram"></i> Instagram</a>
                <a href="https://www.twitch.tv/ilm_reddragon"><i class="fa-brands fa-twitter"></i> Twitter</a>
            </div>
        </div>
        <script>
            var añoFooter = document.getElementById("añoFooter");
            var añoActual = new Date().getFullYear();
            añoFooter.textContent = añoActual;
        </script>
    </footer>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
