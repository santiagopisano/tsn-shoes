<?php


    include "conectar.php";

    session_start();

    $idUsuario = $_SESSION['user'];
    $idProducto = $_POST['id'];


    $query2 = "SELECT * FROM guardados WHERE idUsuario = '$idUsuario' AND idProducto = '$idProducto'";
    $ejecutar2 = $conexion->query($query2);


    if($ejecutar2->num_rows==0){
        $query = "INSERT INTO guardados(idUsuario,idProducto) VALUES('$idUsuario','$idProducto')";
        $ejecutar = $conexion->query($query);
    }else{
        echo '
        <script>
            alert("Este producto ya se guardado");
            window.location="USER-guardados.php";
        </script>
        ';
        exit();
    }


    if($ejecutar){


        echo '
        <script>
            alert("Producto guardado con exito");
            window.location="USER-guardados.php";
        </script>
        ';

    }else{

        echo '
        <script>
            alert("Error al agregar el producto al carrito, intente nuevamente mas tarde");
            window.location="modelos.php";
        </script>
        ';        

    }









?>