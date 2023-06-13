<?php 
    //Errores
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    require_once('../database/conectar.php');
    require_once("../login/usuario.php");
    class RegistroUser extends Conectar {
        private $id_usuario;
        private $empleado_id;
        private $email;
        private $contraseña;
        private $userName;

        public function __construct($id_usuario=0, $empleado_id=0, $email='', $contraseña='', $userName='', $dbCnx=""){
            $this->id_usuario= $id_usuario;
            $this->empleado_id= $empleado_id;
            $this->email= $email;
            $this->contraseña= $contraseña;
            $this->userName= $userName;
            parent::__construct($dbCnx);
        }

        public function setId($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
    
        public function getId() {
            return $this->id_usuario;
        }

        public function setEmpleado_id($empleado_id) {
            $this->empleado_id = $empleado_id;
        }
    
        public function getEmpleado_id() {
            return $this->empleado_id;
        }

        public function setEmail($email) {
            $this->email = $email;
        }
    
        public function getEmail() {
            return $this->email;
        }

        public function setContraseña($contraseña) {
            $this->contraseña = $contraseña;
        }
    
        public function getContraseña() {
            return $this->contraseña;
        }

        public function setUserName($userName) {
            $this->userName = $userName;
        }
    
        public function getUserName() {
            return $this->userName;
        }

        public function verifyUser ($userName){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE userName = ?");
                $stm->execute([$this->userName]);
                if($stm->fetchColumn()){
                    return true;
                }else{return false;}
            } catch (Exception $e) {
                return $e->getMessage();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        public function insertUser(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO users (empleado_id, email, contraseña, userName) VALUES (?, ?, ?, ?)");
                $stm -> execute([$this->empleado_id, $this->email, $this->contraseña, $this->userName]);
                $login = new Usuario();
                $login->setContraseña($_POST['contraseña']);
                $login->setEmail($_POST['userName']);
                $succes = $login->login();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>