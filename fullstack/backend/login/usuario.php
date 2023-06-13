<?php
//Errores
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once("../database/conectar.php");
  class Usuario extends Conectar{
    private $id_usuario;
    private $email;
    private $contraseña;
    private $userName;

      public function __construct($id_usuario = 0, $email="", $userName="", $contraseña="", $dbCnx=""){

          $this->id_usuario = $id_usuario;
          $this->email = $email;  
          $this->userName = $userName;
          $this->contraseña = $contraseña;
          parent::__construct($dbCnx);
      }

      public function setId($id_usuario){
          $this->id_usuario = $id_usuario;
      }
      public function getId(){
          return $this->id_usuario;
      }

      public function setEmail($email){
          $this->email = $email;
      }
      public function getEmail(){
          return $this->email;
      }

      public function setUserName($userName){
        $this->userName = $userName;
      }
      public function getUserName(){
          return $this->userName;
      }

      public function setContraseña($contraseña){
        $this->contraseña = $contraseña;
      }
      public function getContraseña(){
          return $this->contraseña;
      }
    public function fetchAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users");
            $stm-> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }
    }

    public function login(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE userName = ? AND contraseña = ?");
            $stm -> execute([$this->userName, $this->contraseña]);
            $user = $stm->fetchAll();
            if(count($user)>0){
                session_start();
                $_SESSION['id_usuario'] = $user[0]['id_usuario'];
                $_SESSION['userName'] = $user[0]['userName'];
                $_SESSION['contraseña'] = $user[0]['contraseña'];
                return true;
            }else{
                false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
  }
  
?>