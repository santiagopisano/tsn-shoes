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

</head>
<body>
  <script src="script.js"></script>
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
            <a href="ADMIN_modelos.php" class="nav-link active">Administrar Modelos</a>
        </li>
      </ul>
    </div>
    <a href="cerrarSesion.php"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16"><path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/><path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/></svg></a>
  </div>
</nav>

    <div class="contenedorAdmin00">
      <div class="contenedor4">
        <h1>Agregar marca</h1>
          <form action="subirMarca.php" method="post" enctype="multipart/form-data">

          <div class="margen10">
            <label for="nombre" class="label">Nombre de la marca</label>
            <br>  
            <input type="text" name="nombre" class="input" id="nombre">
            <br>
          </div>
          <div class="margen10">
            <label for="imagen" id="labelFile" class="labelFile">Logo o imagen de la marca</label>
            <br>  
            <input type="file" onchange="funcion1(this)" class="inputFile" accept="image/*" name="imagen" id="imagen">
            <br>
            </div>
            <button type="submit" class="boton">Subir</button>

          </form>
        </div>
        <div class="contenedor4">
        <h1>Marcas agregadas</h1>
        <div class="contenedorAdmin02">
            <?php

              include "conectar.php";

              $query = "SELECT nombre,rutaImagen FROM marcas";
              $ejecutar = $conexion->query($query); 

              if($ejecutar->num_rows>0){

                while($datos = $ejecutar->fetch_assoc()){
                  $ruta = $datos['rutaImagen'];
                  $nombre = $datos['nombre']; 

                  echo "<div class='card contenedorAdmin03'>
                  <img src='$ruta' class='card-img-top' alt='imagenMarca'>
                  <div class='card-body'>
                    <h5 class='card-title'>$nombre</h5>
                  </div>
                </div>";



                }
              }      
            ?>
</div>       
</div>
    </div>
</body>
</html>