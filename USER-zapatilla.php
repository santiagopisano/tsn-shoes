<?php

  session_start();


  if(!isset($_SESSION['user'])){

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
            <a href="index.php" class="nav-link active">Ver marcas</a>
        </li>
        <li class="nav-item ultimo">
            <a href="USER_modelos.php" class="nav-link active">Ver modelos</a>
        </li>
      </ul>
      <a class="" aria-current="page" href="#"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16"><path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/><path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/></svg></a>
    <a class="" aria-current="page" href="USER-carrito.php"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></a>
    <a href="cerrarSesion.php"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16"><path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/><path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/></svg></a>
    </div>

  </div>
</nav>

    <main>
        
        <div class="contenedor9">
            <?php

                include "conectar.php";
                $id = $_POST['id'];
                
                $query = "SELECT * FROM modelos WHERE id = '$id'";
                $ejecutar = $conexion->query($query);

                $datos = $ejecutar->fetch_assoc();

                $nombre = $datos['nombre'];
                $precio = $datos['precio'];
                $marca = $datos['marca'];
                $rutaImagen = $datos['rutaImagen'];




            echo"
            
            <img src='$rutaImagen' class='imagenCont9' alt='Imagen del modelo'>

            <div class='contenedor10'>

                <h2>$nombre</h2>
                <h4>$$precio</h4>

            <form action='agregarAlCarrito.php' method='post'>
            
                <h5>Talles<h5>
                <div class='contenedor11'>
            ";



            $query2 = "SELECT * FROM talles WHERE modelo = '$nombre' AND stock > 0";
            $ejecutar2 = $conexion->query($query2);
            $i = 0;

            

            while($datos2 = $ejecutar2->fetch_assoc()){

                $talles[$i] = $datos2['talle'];

                    echo "
                    <div class='radio'>
                    <label for='$i'>$talles[$i]</label>
                    <input type='radio' name='talle' value='$talles[$i]' id='$i' required>
                    </div>";

                $i++;
            }

            echo "
            </div>
            <br>
                <input type='hidden' value = '$id' name='id'>
                <button class='boton boton2' type='submit'>Agregar al carrito</button>
            
                </form>  
            </div>
            ";




            
            ?>
        </div>
    </main>

<footer>
    <div class="contenedorFooter">
        <p>
            Tomas Lucena, Santiago Pisano, Nestor Rodriguez - 2023
        </p>
    </div>
</footer>


</body>
</html>