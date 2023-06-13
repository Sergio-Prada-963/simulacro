<?php
    if (isset($_POST['guardar'])){
        require_once('../../config/productos.php');

        $config = new Cofig;

        $config -> setNombreProducto($_POST['nombreProducto']);
        $config -> setCostoDia($_POST['costoDia']);
        $config -> setDescripcion($_POST['descripcion']);
        $config -> setMarca($_POST['marca']);
        $config -> setDisponible($_POST['disponible']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='../../../frontend/productos.php'</script>";
    }
?>