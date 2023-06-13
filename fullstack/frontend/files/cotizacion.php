<?php 
    //Errores
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Alquilartemis</title>
</head>
<body>
    <main class="barraIsquierda">
        <div class="encabezado">
            <h3>Alquilartemis</h3>
            <img src="https://cdn-icons-png.flaticon.com/512/4445/4445668.png" alt="imagen">
        </div>
        <div class="links">
            <a href="index.php" style="display: flex;gap:2px;">
                <i class="bi bi-house-door"> </i>
                <h3 style="margin: 0px;">Clientes</h3>
            </a>
            <a href="empleados.php" style="display: flex;gap:2px;">
                <i class="bi bi-house-door"> </i>
                <h3 style="margin: 0px;">Empleados</h3>
            </a>
            <a href="productos.php" style="display: flex;gap:2px;">
                <i class="bi bi-house-door"> </i>
                <h3 style="margin: 0px;">Productos</h3>
            </a>
            <a href="cotizacion.php" style="display: flex;gap:2px;">
                <i class="bi bi-house-door"> </i>
                <h3 style="margin: 0px;">Cotizacion</h3>
            </a>
        </div>
    </main>
    <section class="contenido">
        <div class="boton">
            <h1>Cotizaciones...</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Añadir Nueva
            </button>
        </div>
        <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha</th>
            <th scope="col">Nombre Cliente</th>
            <th scope="col">Nombre Empleado</th>
            <th scope="col">Producto</th>
            <th scope="col">Detalles</th>
            <th scope="col" class="OPCIONES" >Opciones</th>
          </tr>
        </thead>
        <tbody class="tbody" id="tabla">
            
        </tbody>
        </table>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Nueva Cotizacion...</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="../backend/acciones/cotizacion/registrarCotizacion.php" method="post">
              <div class="mb-1 col-12">
                <label class="form-label">Fecha de la cotizacion: </label>
                <input type="date" class="form-control" name="fecha"> 
              </div>
              <div class="mb-1 col-12">
                <label class="form-label">Duracion en dias del servicio: </label>
                <input type="number" placeholder="Ingrese el numero de dias del servicio" class="form-control" name="duracion"> 
              </div>
              <div class="mb-1 col-12">
                <label>Nombre del Cliente: </label>
                <select class="form-select" aria-label="Default select example" name="nombreCliente" required>
                  <option selected>Seleccione el nombre del Cliente</option>
                  <?php
                    foreach($idCliente as $key => $valor){
                    ?> 
                  <option value="<?= $valor["id_cliente"]?>"><?= $valor["nombreCliente"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <div class="mb-1 col-12">
                <label>Productos: </label>
                <select class="form-select" aria-label="Default select example" name="productos" required>
                  <option selected>Seleccione el producto</option>
                  <?php
                    foreach($idProducto as $key => $valor){
                    ?> 
                  <option value="<?= $valor["id_productos"]?>"> <?= $valor["nombreProducto"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <div class="mb-1 col-12">
                <label>Nombre del Empleado: </label>
                <select class="form-select" aria-label="Default select example" name="nombreEmpleado" required>
                  <option selected>Seleccione el nombre del Empleado</option>
                  <?php
                    foreach($idEmpleado as $key => $valor){
                    ?> 
                  <option value="<?= $valor["id_empleado"]?>"><?= $valor["nombre"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <div class="mb-1 col-12">
                <label>Hora del alquiler: </label>
                <input type="time" class="form-control" name="horaAlquiler"> 
              </div>
              <div class="mb-1 col-12">
                <label>Detalle Contizacion: </label>
                <input type="text" placeholder="Detalles de la cotizacion" class="form-control" name="detalleCot"> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
              </div>
            </form> 
          </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../acciones/getCotizacion.js" type="module"></script>
  </body>
</html>