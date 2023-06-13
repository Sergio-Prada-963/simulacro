<?php 
//Errorres
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if(isset($_POST['registrar'])){
    require_once("../config/loginConfig.php");
    $registrar = new RegistroUser();
    $registrar->setEmpleado_id(1);
    $registrar->setEmail($_POST['email']);
    $registrar->setUserName($_POST['userName']);
    $registrar->setContraseña($_POST['contraseña']);
    print_r($registrar);
    if($registrar->verifyUser($_POST['userName'])){
        echo "<script> alert('Usuario ya existente '); document.location='login.php'</script>";
    }else{$registrar->insertUser();
        echo "<script> alert('Usuario registrado satisfactoriamente '); document.location='../../frontend/index.php'</script>";
    }
}
?>