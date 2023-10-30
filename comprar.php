<?php

    session_start();

    include "conectar.php";

    $fecha = date('Y-m-d');

    $i = 1;
    $idUsuario = $_SESSION['user'];
    $i2 = $_POST['i'];
    while($i<=$i2){

        $idProducto = $_POST["$i"];
        $talle = $_POST["talle$i"];

        $query = "DELETE FROM carrito WHERE idUsuario='$idUsuario' AND idProducto = '$idProducto' AND talle = '$talle'";
        $ejecutar = $conexion->query($query);

        $query2 = "SELECT nombre,precio FROM modelos WHERE id = '$idProducto'";
        $ejecutar2 = $conexion->query($query2);

        $datos = $ejecutar2->fetch_assoc();

        $nombre = $datos['nombre'];
        $precio = $datos['precio'];

        $query3 = "SELECT stock FROM talles WHERE modelo = '$nombre' AND talle = '$talle'";
        $ejecutar3 = $conexion->query($query3);

        $datos3 = $ejecutar3->fetch_assoc();
        
        $stockAct = $datos3['stock'];

        $stockNuevo = $stockAct - 1; 

        $query4 = "UPDATE talles SET stock = $stockNuevo WHERE modelo = '$nombre' AND talle = '$talle'";
        $ejecutar4 = $conexion->query($query4);

        $query5 = "INSERT INTO compras(idUsuario,idProducto,fecha,talle,precio) VALUES('$idUsuario','$idProducto','$fecha','$talle','$precio')";
        $ejecutar5 = $conexion->query($query5);

        $i++;


    }




    if($ejecutar5){
    echo '
    <script>
        alert("Compra realizada");
        window.location="USER_modelos.php";
    </script>
    ';

}










?>