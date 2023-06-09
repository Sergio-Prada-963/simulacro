<?php 
    //Errores
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    require_once('pdo.php');
    class Cofig extends ConexionPdo {
        private $id_cliente;
        private $nombreCliente;
        private $telefono;
        private $direccion;
        private $tipoCliente;

        public function __construct($id_cliente=0, $nombreCliente='', $telefono=0, $direccion='', $tipoCliente=''){
            $this->id_cliente= $id_cliente;
            $this->nombreCliente= $nombreCliente;
            $this->telefono= $telefono;
            $this->direccion= $direccion;
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

        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
    
        public function getTelefono() {
            return $this->telefono;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
    
        public function getDireccion() {
            return $this->direccion;
        }

        public function setTipoCliente($tipoCliente) {
            $this->tipoCliente = $tipoCliente;
        }
    
        public function getTipoCliente() {
            return $this->tipoCliente;
        }

        public function insertData (){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO clientes(nombreCliente, telefono, direccion, tipoCliente) VALUES(?, ?, ?, ?) ");
                $stm->execute([$this->nombreCliente, $this->telefono, $this->direccion, $this->tipoCliente]);
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
                $stm = $this->dbCnx->prepare("UPDATE clientes SET nombreCliente=?, telefono=?, direccion=?, tipoCliente=? WHERE id_cliente=?");
                $stm-> execute([$this->nombreCliente, $this->telefono, $this->direccion, $this->tipoCliente, $this->id_cliente]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>