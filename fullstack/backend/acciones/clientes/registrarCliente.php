<?php
    if (isset($_POST['guardar'])){
        require_once('../../config/clientes.php');

        $config = new Cofig;

        $config -> setNombreCliente($_POST['nombreCliente']);
        $config -> setTelefonoCliente($_POST['telefonoCliente']);
        $config -> setDireccion($_POST['direccion']);
        $config -> setcorreoCliente($_POST['correoCliente']);
        $config -> setTipoCliente($_POST['tipoCliente']);

        $config -> insertData();
        echo $_POST['nombreCliente'];
        echo $_POST['telefonoCliente'];
        echo $_POST['direccion'];
        echo $_POST['correoCliente'];
        echo $_POST['tipoCliente'];
        
        echo "<script>alert('datos guardados');document.location='../../../frontend/index.php'</script>";
    }
?>