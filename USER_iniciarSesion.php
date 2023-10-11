<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="contenedor2">
    <div class="contenedor0">
    <form action="iniciarSesionUser.php" method="post">
        <h2>Ingresar</h2>
        <div class="contenedorLabelInput">
        <label for="email">Ingrese su direccion de correo</label>
        <br>
        <input type="text"  class="input" name="email" id="email" required>
        </div>
        <br>
        <div class="contenedorLabelInput">
        <label for="contra">Ingrese su contraseña</label>
        <br>
        <input type="password" class="input" name="contrasena" id="contra" required>
        <br>
        </div>
        <div class="contenedorBoton">
            <button type="submit" class="boton">Iniciar sesion</button>
        </div>
    </form>
    </div>

    <div class="contenedor3">
        <h1>TSN SHOES</h1>
        <p>Ingresa o registrate para continuar.</p>
        <div class="contenedorBoton">
        <br>
        <a href="ADMIN_registrarse.php" class="botonN">Soy administrador</a>
        </div>
    </div>

    <div class="contenedor0">
    <form action="registrarUsuario.php" method="post">
        
    <h2>Registrarse</h2>
        <div class="contenedorLabelInput">
        <label for="email">Ingrese su direccion de correo</label>
        <br>
        <input type="text"  class="input" name="email" id="email" required>
        </div>
        <br>
        <div class="contenedorLabelInput">
        <label for="contra">Ingrese su contraseña</label>
        <br>
        <input type="password" class="input" name="contrasena" id="contra" required>
        <br>
        </div>
        <br>
        <div class="contenedorLabelInput">
        <label for="contra">Confirmar contraseña</label>
        <br>
        <input type="password" class="input" name="contrasenaConfirmar" id="contra" required>
        <br>
        </div>
        <div class="contenedorBoton">
            <button type="submit" class="boton">Registrarse</button>
        </div>



    </form>
    </div>
    </div>

</body>
</html>