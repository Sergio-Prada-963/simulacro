
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
            <h1>Empleados...</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Añadir Nuevo
            </button>
        </div>
        <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Empleados</th>
            <th scope="col">Edad</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha Ingreso</th>
            <th scope="col">Cargo</th>
            <th scope="col" class="row col-12" >Opciones</th>
          </tr>
        </thead>
        <tbody id="tabla">
            

        </tbody>
        </table>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Nuevo Empleado...</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="../backend/acciones/empleados/registrarEmpleado.php" method="post">
              <div class="mb-1 col-12">
                <label class="form-label">Nombre del empleado: </label>
                <input type="text" placeholder="Ingrese el nombre del empleado" class="form-control" name="nombre"> 
              </div>
              <div class="mb-1 col-12">
                <label class="form-label">Edad del empleado: </label>
                <input type="number" placeholder="Ingrese la edad del empleado" class="form-control" name="edad"> 
              </div>
              <div class="mb-1 col-12">
                <label>Telefono del empleado: </label>
                <input type="number" placeholder="Ingrese la edad del empleado" class="form-control" name="telefono"> 
              </div>
              <div class="mb-1 col-12">
                <label>Email del empleado: </label>
                <input type="email" placeholder="Ingrese el email del empleado" class="form-control" name="email"> 
              </div>
              <div class="mb-1 col-12">
                <label>Fecha de Ingreso del empleado: </label>
                <input type="date" class="form-control" name="fechaIngreso"> 
              </div>
              <div class="mb-1 col-12">
                <label>Cargo del empleado: </label>
                <input type="text" placeholder="Ingrese el cargo del empleado" class="form-control" name="cargo"> 
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
  <script src="../acciones/empleados/getEmpleados.js" type="module"></script>
  </body>
</html>