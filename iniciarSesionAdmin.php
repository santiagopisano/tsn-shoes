<?php

    include "conectar.php";

    $clave = $_POST['clave'];

    $query = "SELECT clavekey FROM admins";
    $ejecutar = mysqli_query($conexion,$query);
    $datos = mysqli_fetch_assoc($ejecutar);
    $claveEncriptada = $datos['clavekey'];

    if(password_verify($clave,$claveEncriptada )){

        session_start();
        $_SESSION['admin'] = "conectado";

        echo '
        <script>
            alert("Sesion iniciada");
            window.location="index.php";
        </script>
        ';


    }else{
        echo '
        <script>
            alert("La clave es incorrecta");
            window.location="index.php";
        </script>
        ';
    }












?>