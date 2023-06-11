<?php 
    //Errores
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    require_once('pdo.php');
    class Cofig extends ConexionPdo {
        private $id_cliente;
        private $nombreCliente;
        private $telefonoCliente;
        private $direccion;
        private $correoCliente;
        private $tipoCliente;

        public function __construct($id_cliente=0, $nombreCliente='', $telefonoCliente=0, $direccion='', $correoCliente='', $tipoCliente=''){
            $this->id_cliente= $id_cliente;
            $this->nombreCliente= $nombreCliente;
            $this->telefonoCliente= $telefonoCliente;
            $this->direccion= $direccion;
            $this->correoCliente= $correoCliente;
            $this->tipoCliente= $tipoCliente;
            parent::__construct();
        }

        public function setId($id_cliente) {
            $this->id_cliente = $id_cliente;
        }
    
        public function getId() {
            return $this->id_cliente;
        }

        public function setNombreCliente($nombreCliente) {
            $this->nombreCliente = $nombreCliente;
        }
    
        public function getNombreCliente() {
            return $this->nombreCliente;
        }

        public function setTelefonoCliente($telefonoCliente) {
            $this->telefonoCliente = $telefonoCliente;
        }
    
        public function getTelefonoCliente() {
            return $this->telefonoCliente;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
    
        public function getDireccion() {
            return $this->direccion;
        }

        public function setcorreoCliente($correoCliente) {
            $this->correoCliente = $correoCliente;
        }
    
        public function getcorreoCliente() {
            return $this->correoCliente;
        }

        public function setTipoCliente($tipoCliente) {
            $this->tipoCliente = $tipoCliente;
        }
    
        public function getTipoCliente() {
            return $this->tipoCliente;
        }

        public function insertData (){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO clientes(nombreCliente, telefonoCliente, direccion, correoCliente, tipoCliente) VALUES(?, ?, ?, ?, ?) ");
                $stm->execute([$this->nombreCliente, $this->telefonoCliente, $this->direccion, $this->correoCliente, $this->tipoCliente]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM clientes");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM clientes WHERE id_cliente = ?");
                $stm -> execute([$this->id_cliente]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM clientes WHERE id_cliente=?");
                $stm-> execute([$this-> id_cliente]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE clientes SET nombreCliente=?, telefonoCliente=?, direccion=?, correoCliente=?, tipoCliente=? WHERE id_cliente=?");
                $stm-> execute([$this->nombreCliente, $this->telefonoCliente, $this->direccion, $this->tipoCliente, $this->correoCliente, $this->id_cliente]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>