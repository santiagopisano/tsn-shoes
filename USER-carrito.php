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
    <a class="" aria-current="page" href="#"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></a>
    <a href="cerrarSesion.php"><svg class="carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16"><path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/><path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/></svg></a>
    </div>

  </div>
</nav>

<main>

        <div class="contenedor13">

            <?php

                include "conectar.php";
                $idUsuario = $_SESSION['user'];


                $query = "SELECT idProducto, talle FROM carrito WHERE idUsuario='$idUsuario'";
                $ejecutar = $conexion->query($query);
            
                
                
                if($ejecutar->num_rows>0){

                    $i = 0;

                    while($datos = $ejecutar->fetch_assoc()){

                        $idProducto = $datos['idProducto'];
                        $talle = $datos['talle'];
                        
                        $query2 = "SELECT * FROM modelos WHERE id = '$idProducto'";
                        $ejecutar2 = $conexion->query($query2);

                        while($datos2 = $ejecutar2->fetch_assoc()){

                            $precio = $datos2['precio'];
                            $nombre = $datos2['nombre'];
                            $ruta = $datos2['rutaImagen'];
                            $marca = $datos2['marca'];
                            $id2 = $datos2['id'];


                        echo "
                        
                            <div class='contenedor14'>
                            
                                <div class='tabla00'>$nombre</div>
                                
                                <div class='tabla01'>$marca</div>
                                
                                <div class='tabla02'>$talle</div>

                                <div class='tabla03'>$precio</div>
                                
                                <div class='tabla04'><img src='$ruta'></div>

                                <form action='eliminarProductoCarrito.php' method='post'>



                                <input type='hidden' name='talle' value='$talle'>

                                <input type='hidden' value=$id2>
                                <button type='submit' class='none'>
                                <div class='tabla05'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                                <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                              </svg></div></button>
                            </form>
                            
                            </div>
                        
                        
                        
                        ";

                        $total[$i] = $precio;
                            
                        $i++;

                        }}

                        $totalFinal = 0;

                    foreach($total as $total2){

                        $totalFinal = $totalFinal + $total2;

                    }


                    echo "
                        <div class='contenedor15'>
                        
                        <form action='comprar.php' method='post'>";


                        $query3 = "SELECT idProducto FROM carrito WHERE idUsuario='$idUsuario'";
                        $ejecutar3 = $conexion->query($query);
                        $i2 = 0;

                        while($datos3=$ejecutar3->fetch_assoc()){


                            $i2++;
                            $id3 = $datos3['idProducto'];

                            echo "<input type='hidden' name='$i2' value='$id3'>";

                        }       


                      echo "
                        
                      <input type='hidden' name='i' value='$i2'>

                      <input type='hidden' name='talle' value='$talle'>

                      <button type='submit' class='botonOscuro'>Realizar compra</button>

                        </form>

                        </div>

                    
                    ";
                    

                }else{


                    echo "No hay productos en el carrito";
                    
                }
            
            
                
            
            
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