<?php

    include "conectar.php";
    $carpeta = "modelos/";
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];

    $query2 = "SELECT * FROM modelos WHERE nombre = '$nombre'";
    $ejecutar2 = $conexion->query($query2);

    if($ejecutar2->num_rows>0){

        echo '
        <script>
            alert("El modelo ya esta en la base, si desea actualizar el stock lo puede hacer desde la seccion Administar Stock, si desea actualizar el precio, puede hacerlo desde Administrar Precios");
            window.location="ADMIN_modelos.php";
        </script>
        ';

        exit();
    }
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    $nombreImagen= $_FILES['imagen']['name'];
    $imagenTemporal = $_FILES['imagen']['tmp_name'];
    $rutaArchivo = $carpeta.$nombreImagen;

    if(move_uploaded_file($imagenTemporal, $rutaArchivo)){ 
    
    $query0 = "INSERT INTO modelos(nombre,precio,marca,rutaImagen) VALUES('$nombre','$precio','$marca','$rutaArchivo')";
    $ejecutar = $conexion->query($query0);
    
}
    $talle = $_POST['talle'];
    $stock = $_POST['stock'];

    $query1 = "INSERT INTO talles(modelo,talle,stock) VALUES('$nombre','$talle','$stock')";
    $ejecutar1 = $conexion->query($query1);

    $i = 0;

    while(isset($_POST["talles$i"]) && isset($_POST["stock$i"])){

        $talle2 = $_POST["talles$i"];
        $stock2 = $_POST["stock$i"];

        $query1 = "INSERT INTO talles(modelo,talle,stock) VALUES('$nombre','$talle2','$stock2')";
        $ejecutar1 = $conexion->query($query1);

        $i++;
    }

    echo '
    <script>
        alert("Modelo subido");
        window.location="ADMIN_modelos.php";
    </script>
    ';














?>