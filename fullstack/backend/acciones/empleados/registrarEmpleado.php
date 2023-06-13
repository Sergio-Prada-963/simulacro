<?php
    if (isset($_POST['guardar'])){
        require_once('../../config/empleados.php');

        $config = new Cofig;

        $config -> setNombre($_POST['nombre']);
        $config -> setEdad($_POST['edad']);
        $config -> setTelefono($_POST['telefono']);
        $config -> setEmail($_POST['email']);
        $config -> setFechaIngreso($_POST['fechaIngreso']);
        $config -> setCargo($_POST['cargo']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='../../../frontend/empleados.php'</script>";
    }
?>