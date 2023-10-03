<?php

    include 'conectar.php';
    $longitud = 8;
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';
    $caracteresLongitud = strlen($caracteres);
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, $caracteresLongitud - 1)];
    }

    echo $codigo;

    $codigoEncriptado=password_hash($codigo, PASSWORD_DEFAULT);
    $subir = mysqli_query($conexion, "INSERT INTO admins(clavekey) VALUE('$codigoEncriptado')")



?>