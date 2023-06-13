
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
            <h1>Productos...</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Añadir Nuevo
            </button>
        </div>
        <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Producto</th>
            <th scope="col">Costo por Dia</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Marca</th>
            <th scope="col">Disponible</th>
            <th scope="col" class="row col-12">Opciones</th>
          </tr>
        </thead>
        <tbody>
            <?php 
                foreach($all as $key => $value){
            ?>
            <tr>
              <td><?= $value['id_productos'] ?></td>
              <td><?= $value['nombreProducto'] ?></td>
              <td><?= $value['costoDia'] ?></td>
              <td><?= $value['descripcion'] ?></td>
              <td><?= $value['marca'] ?></td>
              <td><?php if($value['disponible'] == 1){echo "Disponible";}else{echo "No Disponible";} ?></td>
              <td class="row gap-2 col-12">
                <a class="btn btn-danger" href="../backend/acciones/productos/borrarProducto.php?id=<?= $value['id_productos'] ?>&req=delete">BORRAR</a>
                <a class="btn btn-primary" href="../backend/acciones/productos/editarProducto.php?id=<?=$value['id_productos']?>">Editar</a>
              </td>
            </tr>
            <?php  } ?>
        </tbody>
        </table>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Nuevo Producto...</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="../backend/acciones/productos/registrarProducto.php" method="post">
              <div class="mb-1 col-12">
                <label class="form-label">Nombre del producto: </label>
                <input type="text" placeholder="Ingrese el nombre del producto" class="form-control" name="nombreProducto"> 
              </div>
              <div class="mb-1 col-12">
                <label class="form-label">Costo por dia: </label>
                <input type="number" placeholder="Ingrese costo por dia del Producto" class="form-control" name="costoDia"> 
              </div>
              <div class="mb-1 col-12">
                <label>Descripcion del producto: </label>
                <input type="text" placeholder="Ingrese la descripcion del producto" class="form-control" name="descripcion"> 
              </div>
              <div class="mb-1 col-12">
                <label>Marca del Producto: </label>
                <input type="text" placeholder="Ingrese la marca del producto" class="form-control" name="marca"> 
              </div>
              <div class="mb-1 col-12">
                <label>Disponibilidad: </label>
                <select class="form-select" aria-label="Default select example" id="empleado_id" name="disponible" required>
                    <option selected >Seleccione si el producto esta disponible</option>
                    <option value="1">Producto Disponible</option>
                    <option value="0">Producto NO disponible</option>
                </select>
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
</body>
</html>