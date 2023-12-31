<?php

    session_start();

    if(isset($_SESSION['user'])){

      header("location: USER_index.php");
      exit();

    }

    if(isset($_SESSION['admin'])){

      header("location: ADMIN_index.php");
      exit();
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid nav-flex">
    <a class="navbar-brand" href="#">TSN SHOES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a href="" class="nav-link active">Ver marcas</a>
        </li>
        <li class="nav-item ultimo">
            <a href="" class="nav-link active">Ver modelos</a>
        </li>
      </ul>
    </div>
    <a href="USER_iniciarSesion.php" class="nav-link link">Iniciar sesion</a>
</div>
</nav>


    <main>
    <div class="contenedor4">
        <h1>Marcas agregadas</h1>
        <div class="contenedorAdmin02">
            <?php

              include "conectar.php";

              $query = "SELECT * FROM marcas";
              $ejecutar = $conexion->query($query); 

              if($ejecutar->num_rows>0){

                while($datos = $ejecutar->fetch_assoc()){
                  $ruta = $datos['rutaImagen'];
                  $nombre = $datos['nombre']; 
                  $id = $datos['id'];

                  echo "
                  <a href='USER_iniciarSesion.php'><div class='card contenedorAdmin03'>
                  <img src='$ruta' class='card-img-top' alt='imagenMarca'>
                  <div class='card-body'>
                    <h5 class='card-title'>$nombre</h5>
                  </div>
                </div></a>";



                }
              }      
            ?>
            
            
</div>       
</div>


    </main>




</body>
</html>