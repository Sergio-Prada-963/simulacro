<?php 
    if(isset($_POST['ingresar'])){
        require_once("usuario.php");
        $credenciales = new Usuario();
        $credenciales->setUserName($_POST['userName']);
        $credenciales->setContraseña($_POST['contraseña']);
        $login = $credenciales -> login();
        print_r($credenciales);
        if($login){
            header('location: ../../frontend/index.php');
        }else{
            echo "<script> alert('password/email invalidos'); document.location='login.php'</script>";
        }
    }
?>
