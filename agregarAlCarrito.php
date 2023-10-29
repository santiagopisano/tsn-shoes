<?php


    include "conectar.php";

    session_start();

    $idUsuario = $_SESSION['user'];
    $idProducto = $_POST['id'];
    $talle = $_POST['talle'];




    $query2 = "SELECT * FROM carrito WHERE idUsuario = '$idUsuario' AND idProducto = '$idProducto' AND talle ='$talle'";
    $ejecutar2 = $conexion->query($query2);


    if($ejecutar2->num_rows==0){
        $query = "INSERT INTO carrito(idUsuario,idProducto,talle) VALUES('$idUsuario','$idProducto','$talle')";
        $ejecutar = $conexion->query($query);
    }else{
        echo '
        <script>
            alert("Este producto ya se encuentra en el carrito");
            window.location="USER-carrito.php";
        </script>
        ';
        exit();
    }


    if($ejecutar){


        echo '
        <script>
            alert("Producto agregado al carrito con exito");
            window.location="USER-carrito.php";
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