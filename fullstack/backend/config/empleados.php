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
        private $cargo;

        public function __construct($id_empleado=0, $nombre='', $edad=0, $cargo=''){
            $this->id_empleado= $id_empleado;
            $this->nombre= $nombre;
            $this->edad= $edad;
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

        public function setCargo($cargo) {
            $this->cargo = $cargo;
        }
    
        public function getCargo() {
            return $this->cargo;
        }

        public function insertData (){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO empleados(nombre, edad, cargo) VALUES(?, ?, ?) ");
                $stm->execute([$this->nombre, $this->edad, $this->cargo]);
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
                $stm = $this->dbCnx->prepare("UPDATE empleados SET nombre=?, edad=?, cargo=? WHERE id_empleado=?");
                $stm-> execute([$this->nombre, $this->edad, $this->cargo, $this->id_empleado]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>