<?php 
require_once('../../config/cotizacion.php');
$data = new Cofig();
$id = $_GET['id'];
$data-> setId($id);
$record = $data->selectOne();
$val = $record[0];

if(isset($_POST['editar'])){
    $data -> setFecha($_POST['fecha']);
    $data -> setDuracion($_POST['duracion']);
    $data -> setNombreCliente($_POST['nombreCliente']);
    $data -> setTelefonoCliente($_POST['nombreCliente']);
    $data -> setDireccionCliente($_POST['nombreCliente']);
    $data -> setTipoCliente($_POST['nombreCliente']);
    $data -> setProductos($_POST['productos']);
    $data -> setNombreEmpleado($_POST['nombreEmpleado']);
    $data -> setHoraAlquiler($_POST['horaAlquiler']);
    $data -> setPrecioProducto($_POST['productos']);
    $data -> setDetalleCot($_POST['detalleCot']);

    $data->update();
    echo "<script>alert('Datos actualizados satisfactoriamente');document.location='../../../frontend/cotizacion.php'</script>";
};
$idCliente = $data -> obtenerClienteId();
$idEmpleado = $data -> obtenerEmpleadoId();
$idProducto = $data -> obtenerProductoId();
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
    <h2>Editando Cotizacion...</h2>
    <div class="editar">
        <form class="col d-flex flex-wrap m-5" action="" method="post">
            <div class="mb-1 col-12">
                <label class="form-label">Fecha de la cotizacion: </label>
                <input type="date" class="form-control" name="fecha" value="<?= $val['fecha']; ?>"> 
            </div>
            <div class="mb-1 col-12">
                <label class="form-label">Duracion en dias del servicio: </label>
                <input type="number" placeholder="Ingrese el numero de dias del servicio" class="form-control" name="duracion" value="<?= $val['duracion']; ?>"> 
            </div>
            <div class="mb-1 col-12">
                <label>Nombre del Cliente: </label>
                <select class="form-select" aria-label="Default select example" name="nombreCliente" required>
                    <option selected>Seleccione el nombre del Cliente</option>
                    <?php foreach($idCliente as $key => $valor){ ?> 
                        <option value="<?= $valor["id_cliente"]?>"><?= $valor["nombreCliente"]?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-1 col-12">
                <label>Productos: </label>
                <select class="form-select" aria-label="Default select example" name="productos" required>
                    <option selected>Seleccione el producto</option>
                    <?php foreach($idProducto as $key => $valor){ ?> 
                        <option value="<?= $valor["id_productos"]?>"> <?= $valor["nombreProducto"]?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-1 col-12">
                <label>Nombre del Empleado: </label>
                <select class="form-select" aria-label="Default select example" name="nombreEmpleado" required>
                    <option selected>Seleccione el nombre del Empleado</option>
                    <?php foreach($idEmpleado as $key => $valor){ ?> 
                        <option value="<?= $valor["id_empleado"]?>"><?= $valor["nombre"]?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-1 col-12">
                <label>Hora del alquiler: </label>
                <input type="time" class="form-control" name="horaAlquiler" value="<?= $val['horaAlquiler']; ?>"> 
            </div>
            <div class="mb-1 col-12">
                <label>Detalle Contizacion: </label>
                <input type="text" placeholder="Detalles de la cotizacion" class="form-control" name="detalleCot" value="<?= $val['detalleCot']; ?>"> 
            </div>
            <div class="d-flex justify-content-center m-4" style="width:80%;">
                <input style="width:80%;" type="submit" class="btn btn-primary" name="editar" value="Editar">
            </div>
        </form>
    </div>
</section>
</body>
</html>