<?php

    session_start();

    include "conectar.php";

    $idUser = $_SESSION['user'];
    $id = $_POST['id'];
    $talle = $_POST['talle'];


    $query = "DELETE FROM carrito WHERE idUsuario='$idUser' AND idProducto = '$id' AND talle = '$talle'";
    $ejecutar = $conexion->query($query);

   if($ejecutar){

       echo '
       <script>
           alert("Producto eliminado");
           window.location="USER-carrito.php";
       </script>
       ';

   }







?>