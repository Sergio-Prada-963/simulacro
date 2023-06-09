<?php 
    //Errores
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    require_once('pdo.php');
    class Cofig extends ConexionPdo {
        private $id_cotizacion;
        private $fecha;
        private $empleado;
        private $detalleCot;
        private $duracion;

        public function __construct($id_cotizacion=0, $fecha='', $empleado='', $detalleCot='', $duracion=''){
            $this->id_cotizacion= $id_cotizacion;
            $this->fecha= $fecha;
            $this->empleado= $empleado;
            $this->detalleCot= $detalleCot;
            $this->duracion= $duracion;
            parent::__construct();
        }

        public function setId($id_cotizacion) {
            $this->id_cotizacion = $id_cotizacion;
        }
    
        public function getId() {
            return $this->id_cotizacion;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
    
        public function getFecha() {
            return $this->fecha;
        }

        public function setEmpleado($empleado) {
            $this->empleado = $empleado;
        }
    
        public function getEmpleado() {
            return $this->empleado;
        }

        public function setDetalleCot($detalleCot) {
            $this->detalleCot = $detalleCot;
        }
    
        public function getDetalleCot() {
            return $this->detalleCot;
        }

        public function setDuracion($duracion) {
            $this->duracion = $duracion;
        }
    
        public function getDuracion() {
            return $this->duracion;
        }

        public function insertData (){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO cotizacion(fecha, empleado, detalleCot, duracion) VALUES(?, ?, ?, ?) ");
                $stm->execute([$this->fecha, $this->empleado, $this->detalleCot, $this->duracion]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM cotizacion");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM cotizacion WHERE id_cotizacion = ?");
                $stm -> execute([$this->id_cotizacion]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM cotizacion WHERE id_cotizacion=?");
                $stm-> execute([$this-> id_cotizacion]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE cotizacion SET fecha=?, empleado=?, detalleCot=?, duracion=? WHERE id_cotizacion=?");
                $stm-> execute([$this->fecha, $this->empleado, $this->detalleCot, $this->duracion, $this->id_cotizacion]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>