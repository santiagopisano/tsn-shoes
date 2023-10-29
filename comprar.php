<?php

    include "conectar.php";

    $i = 1;
    $idUsuario = $_SESSION['user'];
    $i2 = $_POST['i'];
    while($i<=$i2){

        $idProducto = $_POST["$i"];
        
        $query = "DELETE FROM carrito WHERE idUsuario='$idUsuario' AND idProducto = '$idProducto'";
        $ejecutar = $conexion->query($query);

        $query2 = "SELECT nombre FROM modelos WHERE id = '$idProducto'";
        $ejecutar2 = $conexion->query($query2);

        $datos = $ejecutar2->fetch_assoc();

        $nombre = $datos['nombre'];

        $query3 = "SELECT stock FROM talles WHERE modelo = '$nombre' AND talle = '$talle'";
        $ejecutar3 = $conexion->query($query3);

        $datos3 = $ejecutar3->fetch_assoc();
        
        $stockAct = $datos3['stock'];

        $stockNuevo = $stockAct - 1; 

        $query4 = "UPDATE talles SET stock = $stockNuevo WHERE modelo = '$nombre' AND talle = '$talle'";


        $i++;


    }


    echo '
    <script>
        alert("Compra realizada");
        window.location="USER_index.php";
    </script>
    ';



















?>