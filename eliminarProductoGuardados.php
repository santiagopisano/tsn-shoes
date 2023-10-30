<?php

    session_start();

    include "conectar.php";

    $idUser = $_SESSION['user'];
    $id = $_POST['id'];


    $query = "DELETE FROM guardados WHERE idUsuario='$idUser' AND idProducto = '$id'";
    $ejecutar = $conexion->query($query);

   if($ejecutar){

       echo '
       <script>
           alert("Producto eliminado");
           window.location="USER-guardados.php";
       </script>
       ';

   }







?>