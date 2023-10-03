<?php

    include "conectar.php";

    $email=$_POST['email'];
    $contrasena=$_POST['contrasena'];
    $contrasenaConfirmar=$_POST['contrasenaConfirmar'];


    $query2 = "SELECT * FROM users WHERE email='$email'";
    $verificar = mysqli_query($conexion,$query2);

    if(mysqli_num_rows($verificar)>0){

        echo '
        <script>
            alert("Este correo ya esta registrado, redirigiendo a iniciar sesion");
            window.location="USER_iniciarSesion.php"
        </script>
        ';

    }


    if($contrasena == $contrasenaConfirmar){

        $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);
        $query = "INSERT INTO users(email,contrasena) VALUES('$email','$contrasenaEncriptada')";
        $ejecutar= mysqli_query($conexion,$query);

        if($ejecutar){

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
                alert("Error al crear usuario, intente luego");
            </script>
            ';
        }

    }else{

        echo '
        <script>
            alert("Las contraseñas no coinciden");
            window.location="index.php"
        </script>
        ';


    }

?>