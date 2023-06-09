<?php 
    //Errores
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    require_once('pdo.php');
    class Cofig extends ConexionPdo {
        private $id_productos;
        private $nombreProducto;
        private $costoDia;
        private $descripcion;

        public function __construct($id_productos=0, $nombreProducto='', $costoDia=0, $descripcion=''){
            $this->id_productos= $id_productos;
            $this->nombreProducto= $nombreProducto;
            $this->costoDia= $costoDia;
            $this->descripcion= $descripcion;
            parent::__construct();
        }

        public function setId($id_productos) {
            $this->id_productos = $id_productos;
        }
    
        public function getId() {
            return $this->id_productos;
        }

        public function setNombreProducto($nombreProducto) {
            $this->nombreProducto = $nombreProducto;
        }
    
        public function getNombreProducto() {
            return $this->nombreProducto;
        }

        public function setCostoDia($costoDia) {
            $this->costoDia = $costoDia;
        }
    
        public function getCostoDia() {
            return $this->costoDia;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
    
        public function getDescripcion() {
            return $this->descripcion;
        }

        public function insertData (){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO productos(nombreProducto, costoDia, descripcion) VALUES(?, ?, ?) ");
                $stm->execute([$this->nombreProducto, $this->costoDia, $this->descripcion]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM productos");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM productos WHERE id_productos = ?");
                $stm -> execute([$this->id_productos]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM productos WHERE id_productos=?");
                $stm-> execute([$this-> id_productos]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE productos SET nombreProducto=?, costoDia=?, descripcion=? WHERE id_productos=?");
                $stm-> execute([$this->nombreProducto, $this->costoDia, $this->descripcion, $this->id_productos]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>