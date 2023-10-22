<?php
    include "conectar.php";

    $nombre = $_POST['nombre'];
    $carpeta = "ARCHIVO_MARCAS/";
    
    $nombreImagen= $_FILES['imagen']['name'];
    $imagenTemporal = $_FILES['imagen']['tmp_name'];

    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    $rutaArchivo = $carpeta.$nombreImagen;

    if(move_uploaded_file($imagenTemporal, $rutaArchivo)){

        $query = "INSERT INTO marcas(nombre, rutaImagen) VALUES('$nombre', '$rutaArchivo')";
        $ejecutar= $conexion->query($query);

        if($ejecutar){

            echo '<script>
            alert("Marca subida")
            window.location = "index.php";
        </script>';

        }


    }

    














?>