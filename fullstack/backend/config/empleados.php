<?php 
    //Errores
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    require_once('pdo.php');
    class Cofig extends ConexionPdo {
        private $id_empleado;
        private $nombre;
        private $edad;
        private $telefono;
        private $email;
        private $fechaIngreso;
        private $cargo;

        public function __construct($id_empleado=0, $nombre='', $edad=0, $telefono=0, $email='', $fechaIngreso='', $cargo=''){
            $this->id_empleado= $id_empleado;
            $this->nombre= $nombre;
            $this->edad= $edad;
            $this->telefono= $telefono;
            $this->email= $email;
            $this->fechaIngreso= $fechaIngreso;
            $this->cargo= $cargo;
            parent::__construct();
        }

        public function setId($id_empleado) {
            $this->id_empleado = $id_empleado;
        }
    
        public function getId() {
            return $this->id_empleado;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    
        public function getNombre() {
            return $this->nombre;
        }

        public function setEdad($edad) {
            $this->edad = $edad;
        }
    
        public function getEdad() {
            return $this->edad;
        }

        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
    
        public function getTelefono() {
            return $this->telefono;
        }

        public function setEmail($email) {
            $this->email = $email;
        }
    
        public function getEmail() {
            return $this->email;
        }

        public function setFechaIngreso($fechaIngreso) {
            $this->fechaIngreso = $fechaIngreso;
        }
    
        public function getFechaIngreso() {
            return $this->fechaIngreso;
        }

        public function setCargo($cargo) {
            $this->cargo = $cargo;
        }
    
        public function getCargo() {
            return $this->cargo;
        }

        public function insertData (){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO empleados(nombre, edad, telefono, email, fechaIngreso, cargo) VALUES(?, ?, ?, ?, ?, ?) ");
                $stm->execute([$this->nombre, $this->edad, $this->telefono, $this->email, $this->fechaIngreso, $this->cargo]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM empleados");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM empleados WHERE id_empleado = ?");
                $stm -> execute([$this->id_empleado]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM empleados WHERE id_empleado=?");
                $stm-> execute([$this-> id_empleado]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE empleados SET nombre=?, edad=?, telefono=?, email=?, fechaIngreso=?, cargo=? WHERE id_empleado=?");
                $stm-> execute([$this->nombre, $this->edad, $this->telefono, $this->email, $this->fechaIngreso, $this->cargo, $this->id_empleado]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>