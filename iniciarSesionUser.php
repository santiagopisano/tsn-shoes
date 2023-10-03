<?php

    include "conectar.php";

    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT id,contrasena FROM users WHERE email = '$email'";
    $ejecutar = mysqli_query($conexion,$query);
    $datos =  mysqli_fetch_assoc($ejecutar);

    $contrasenaEncriptada = $datos['contrasena'];

    if(password_verify($contrasena,$contrasenaEncriptada)){

        $id = $datos['id'];
        session_start();

        $_SESSION['user'] = $id;
        echo '
        <script>
            alert("Sesion iniciada");
            window.location="index.php";
        </script>
        ';

    }else{

        echo '
        <script>
            alert("email o contraseña incorrecta");
            window.location="USER_iniciarSesion.php"
        </script>
        ';

    }












?>