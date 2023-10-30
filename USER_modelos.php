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
      <a class="" aria-current="page" href="USER-guardados.php"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16"><path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/><path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/></svg></a>
    <a class="" aria-current="page" href="USER-carrito.php"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></a>
    <a href="cerrarSesion.php"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16"><path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/><path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/></svg></a>
    </div>

  </div>
</nav>


  <h1 class="contenedor5">Modelos de calzado</h1>

<div class="contenedor5">

  <div class="contenedor6">
        <h5>Filtrar</h5>
        <h6>Por marca</h6>
        <?php

            include "conectar.php";

            $query0 = "SELECT nombre FROM marcas";
            $ejecutar = $conexion->query($query0);
            

            while($datos = $ejecutar->fetch_assoc()){
                $nombre = $datos['nombre'];

                echo "<form method='post' action='USER_modelos.php'>
                        <input name='filtro' type='hidden' value='$nombre'>
                        <button class='none' type='submit'>$nombre</button>        
                    </form>                
                ";
            }
        ?>
        <h6>Por precio</h6>
        
            <form action="USER_modelos.php" method="post">

                <input type="hidden" name='filtro1' class="none2" value="menos100">
                <button type="submit" class="none">Menor a 100000</button>
            </form>    
            <form action="USER_modelos.php" method="post">

                <input type="hidden" name='filtro1' class="none2" value="mas100">
                <button type="submit" class="none">Mayor a 100000</button>
            </form>    


  </div>
  <div class="contenedor7">

        <?php

        include "conectar.php";

        if(isset($_POST['filtro'])){

          $filtroMarca = $_POST['filtro'];
          $query1 = "SELECT nombre, precio,rutaImagen,id FROM modelos WHERE marca = '$filtroMarca'";
          $ejecutar1 = $conexion->query($query1);
          
        }else if(isset($_POST['filtro1'])){



          $filtroPrecio = $_POST['filtro1'];
          
          if($filtroPrecio == "mas100"){

            $query1 = "SELECT nombre,precio,rutaImagen,id FROM modelos WHERE precio >= 100000";
            $ejecutar1 = $conexion->query($query1);

          }else{

            $query1 = "SELECT nombre,precio,rutaImagen,id FROM modelos WHERE precio < 100000";
            $ejecutar1 = $conexion->query($query1);

          }

        }else if(isset($_POST['filtro2'])){

          $filtroMarca = $_POST['filtro2'];
          $query1 = "SELECT nombre, precio,rutaImagen,id FROM modelos WHERE marca = '$filtroMarca'";
          $ejecutar1 = $conexion->query($query1);
        }else {

          $query1 = "SELECT nombre, precio,rutaImagen,id FROM modelos";
          $ejecutar1 = $conexion->query($query1);

        }
                

        
        
        
        if($ejecutar1->num_rows>0){
          while($datos = $ejecutar1->fetch_assoc()){
          $nombre = $datos['nombre'];
          $precio = $datos['precio'];
          $ruta = $datos['rutaImagen'];
          $id = $datos['id'];

          
          echo "<div class='card carta'>
          <img src='$ruta' class='card-img-top carta-img' alt='zapatilla'>
          <div class='card-body carta-body'>
            <h5 class='card-title'>$nombre</h5>
            <h6 class='card-title'>$$precio</h6>
            <div class='contenedor8'>  

            <form action='USER-zapatilla.php' method='post'>
            <input type='hidden' name='id' value='$id'>
            <button type='submit' class='botonOscuro boton01'>Ver talles</button>
            
            </form>

            <form action='agregarAGuardados.php' method='post'>
            <input type='hidden' name='id' value='$id'>
            <button type='submit' class='none carrito1'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'  class='carrito' fill='currentColor' class='bi bi-bookmark-plus' viewBox='0 0 16 16'><path d='M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z'/><path d='M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z'/></svg></button>
            </form>
              </div>
            </div>
        </div>";


        }
      }else{
        echo "<span class='blanco'>No hay resultados que coincidan con tu busqueda</span>";
      }

        

        
        ?>
            
            
  </div>
</div>
<footer>
    <div class="contenedorFooter">
        <p>
            Tomas Lucena, Santiago Pisano, Nestor Rodriguez - 2023
        </p>
    </div>
</footer>


</body>
</html>