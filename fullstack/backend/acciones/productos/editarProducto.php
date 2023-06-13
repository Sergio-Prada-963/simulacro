<?php 
require_once('../../config/productos.php');
$data = new Cofig();
$id = $_GET['id'];
$data-> setId($id);
$record = $data->selectOne();
$val = $record[0];

if(isset($_POST['editar'])){
    $data -> setNombreProducto($_POST['nombreProducto']);
    $data -> setCostoDia($_POST['costoDia']);
    $data -> setDescripcion($_POST['descripcion']);
    $data -> setMarca($_POST['marca']);
    $data -> setDisponible($_POST['disponible']);

    $data->update();
    echo "<script>alert('Datos actualizados satisfactoriamente');document.location='../../../frontend/productos.php'</script>";
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
    <h2>Editando Producto...</h2>
    <div class="editar">
        <form class="col d-flex flex-wrap m-5" action="" method="post">
            <div class="mb-1 col-12">
                <label class="form-label">Nombre del producto: </label>
                <input type="text" placeholder="Ingrese el nombre del producto" class="form-control" name="nombreProducto" value="<?= $val['nombreProducto']; ?>"> 
            </div>
            <div class="mb-1 col-12">
                <label class="form-label">Costo por dia: </label>
                <input type="number" placeholder="Ingrese costo por dia del Producto" class="form-control" name="costoDia" value="<?= $val['costoDia']; ?>"> 
            </div>
            <div class="mb-1 col-12">
                <label>Descripcion del producto: </label>
                <input type="text" placeholder="Ingrese la descripcion del producto" class="form-control" name="descripcion"value="<?= $val['descripcion']; ?>"> 
            </div>
            <div class="mb-1 col-12">
                <label>Marca del Producto: </label>
                <input type="text" placeholder="Ingrese la marca del producto" class="form-control" name="marca" value="<?= $val['marca']; ?>"> 
            </div>
            <div class="mb-1 col-12">
                <label>Disponibilidad: </label>
                <select class="form-select" aria-label="Default select example" id="empleado_id" name="disponible" required>
                    <option selected >Seleccione si el producto esta disponible</option>
                    <option value="1">Producto Disponible</option>
                    <option value="0">Producto NO disponible</option>
                </select>
            </div>
            <div class="d-flex justify-content-center m-4" style="width:80%;">
              <input style="width:80%;" type="submit" class="btn btn-primary" name="editar" value="Editar">
            </div>
        </form>
    </div>
</section>
</body>
</html>