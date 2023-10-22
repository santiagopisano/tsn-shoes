<?php

  session_start();


  if(!isset($_SESSION['admin'])){

      header("location: index.php");

  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid flex">
    <a class="navbar-brand" href="index.php">TSN SHOES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a href="index.php" class="nav-link active">Administrar Marcas</a>
        </li>
        <li class="nav-item ultimo">
            <a href="" class="nav-link active">Administrar Modelos</a>
        </li>
      </ul>
    </div>
    <a href="cerrarSesion.php"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16"><path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/><path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/></svg></a>
  </div>
</nav>

    <div class="contenedor4">

    <h1>Subir Modelo</h1>
        
        <form action="subirModelo.php" method="post" enctype="multipart/form-data">

            <label for="nombre">Ingrese el nombre del modelo de la zapatilla</label>
            <br>
            <input type="text" name="nombre" id="nombre" class="input">
            <br>
            <label for="precio">Ingrese el precio de la zapatilla</label>
            <br>
            <input type="number" name="precio" class="input" id="precio">
            <br>
            <div class="margen10">
            <label for="select">Seleccione la marca</label>
            <select name="marca" class="select" id="select">
                <?php

                    include "conectar.php";

                    $query0 = "SELECT nombre FROM marcas";
                    $ejecutar = $conexion->query($query0);
                    
                    while($row = $ejecutar->fetch_assoc()){

                        $marca = $row['nombre'];
                        $arrayMarca[] = $marca;

                    }
                    foreach($arrayMarca as $nombreMarca){

                        echo "<option value = '$nombreMarca'>$nombreMarca</option>";

                    }
                ?>
            </select>
            </div>
            <script>

var conTalles = 0;

function funcion2(){

    var input = document.createElement("input");
    input.type = "number";
    input.classList.add("input");
    input.placeholder = "Ingrese el talle"
    input.name = "talles"+conTalles;

    var input2 = document.createElement("input");
    input2.type = "number";
    input2.classList.add("input");
    input2.placeholder = "Ingrese el stock del talle"
    input2.name = "stock"+conTalles;
    var br = document.createElement("br")

    var contenedor = document.getElementById("TALLES2");
    contenedor.appendChild(input);
    contenedor.appendChild(input2);
    contenedor.appendChild(br)
    conTalles++;
}


    </script>
            <button type="button" class="boton" onclick="funcion2()">Agregar mas talles</button>

            <div id="TALLES">
                    
                  <input type="number" placeholder="Ingrese el talle" required class="input" name="talle" id="talle">
                  <input type="number" class="input" placeholder="Ingrese el stock del talle" name="stock" id="stock">

            </div>    
            
            <div id="TALLES2">

            </div>


            <div class="margen10">
            <label for="imagen" id="labelFile" class="labelFile">Imagen del modelo</label>
            <br>  
            <input type="file" onchange="funcion1(this)" class="inputFile" accept="image/*" name="imagen" id="imagen">
            <br>
            </div>

            <button type="submit" class="boton">Enviar</button>

        </form>
    </div>




</body>
</html>