<?php 
require_once('../../config/empleados.php');
$data = new Cofig();
$id = $_GET['id'];
$data-> setId($id);
$record = $data->selectOne();
$val = $record[0];

if(isset($_POST['editar'])){
    $data -> setNombre($_POST['nombre']);
    $data -> setEdad($_POST['edad']);
    $data -> setTelefono($_POST['telefono']);
    $data -> setEmail($_POST['email']);
    $data -> setFechaIngreso($_POST['fechaIngreso']);
    $data -> setCargo($_POST['cargo']);

    $data->update();
    echo "<script>alert('Datos actualizados satisfactoriamente');document.location='../../../frontend/empleados.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../frontend/css/style.css">
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
            <a href="../../../frontend/index.php" style="display: flex;gap:2px;">
                <i class="bi bi-house-door"> </i>
                <h3 style="margin: 0px;">Clientes</h3>
            </a>
            <a href="../../../frontend/empleados.php" style="display: flex;gap:2px;">
                <i class="bi bi-house-door"> </i>
                <h3 style="margin: 0px;">Empleados</h3>
            </a>
            <a href="../../../frontend/productos.php" style="display: flex;gap:2px;">
                <i class="bi bi-house-door"> </i>
                <h3 style="margin: 0px;">Productos</h3>
            </a>
            <a href="../../../frontend/cotizacion.php" style="display: flex;gap:2px;">
                <i class="bi bi-house-door"> </i>
                <h3 style="margin: 0px;">Cotizacion</h3>
            </a>
        </div>
    </main>
<section class="contenido">
    <h2>Editando Empleado...</h2>
    <div class="editar">
        <form class="col d-flex flex-wrap m-5" action="" method="post">
          <div class="mb-1 col-12">
            <label class="form-label">Nombre del empleado: </label>
            <input type="text" placeholder="Ingrese el nombre del empleado" class="form-control" name="nombre" value="<?= $val['nombre']; ?>"> 
          </div>
          <div class="mb-1 col-12">
            <label class="form-label">Edad del empleado: </label>
            <input type="number" placeholder="Ingrese la edad del empleado" class="form-control" name="edad" value="<?= $val['edad']; ?>"> 
          </div>
          <div class="mb-1 col-12">
            <label>Telefono del empleado: </label>
            <input type="number" placeholder="Ingrese la edad del empleado" class="form-control" name="telefono" value="<?= $val['telefono']; ?>"> 
          </div>
          <div class="mb-1 col-12">
            <label>Email del empleado: </label>
            <input type="email" placeholder="Ingrese el email del empleado" class="form-control" name="email" value="<?= $val['email']; ?>"> 
          </div>
          <div class="mb-1 col-12">
            <label>Fecha de Ingreso del empleado: </label>
            <input type="date" class="form-control" name="fechaIngreso" value="<?= $val['fechaIngreso']; ?>"> 
          </div>
          <div class="mb-1 col-12">
            <label>Cargo del empleado: </label>
            <input type="text" placeholder="Ingrese el cargo del empleado" class="form-control" name="cargo" value="<?= $val['cargo']; ?>"> 
          </div>
          <div class="d-flex justify-content-center m-4" style="width:80%;">
            <input style="width:80%;" type="submit" class="btn btn-primary" name="editar" value="Editar">
          </div>
        </form>
    </div>
</section>
</body>
</html>