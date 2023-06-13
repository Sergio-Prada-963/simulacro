<?php
    require_once("../../config/productos.php");

    $record = new Cofig();
    if(isset($_GET['id']) && isset($_GET['req'])){
        if ($_GET['req'] == "delete"){
            $record -> setId($_GET['id']);
            $record -> delete();
            echo "<script>alert('Dato borrado satisfactoriamente');document.location='../../../frontend/productos.php'</script>";
        }
    }

?>