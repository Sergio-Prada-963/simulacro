<?php
//Errores
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
    if (isset($_POST['guardar'])){
        require_once('../../config/cotizacion.php');

        $config = new Cofig;
        $config -> setFecha($_POST['fecha']);
        $config -> setDuracion($_POST['duracion']);
        $config -> setNombreCliente($_POST['nombreCliente']);
        $config -> setTelefonoCliente($_POST['nombreCliente']);
        $config -> setDireccionCliente($_POST['nombreCliente']);
        $config -> setTipoCliente($_POST['nombreCliente']);
        $config -> setProductos($_POST['productos']);
        $config -> setNombreEmpleado($_POST['nombreEmpleado']);
        $config -> setHoraAlquiler($_POST['horaAlquiler']);
        $config -> setPrecioProducto($_POST['productos']);
        $config -> setDetalleCot($_POST['detalleCot']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='../../../frontend/cotizacion.php'</script>";
    }
?>