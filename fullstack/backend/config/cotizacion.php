<?php 
    //Errores
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    require_once('pdo.php');
    class Cofig extends ConexionPdo {
        private $id_cotizacion;
        private $fecha;
        private $duracion;
        private $nombreCliente;
        private $telefonoCliente;
        private $direccionCliente;
        private $tipoCliente;
        private $productos;
        private $nombreEmpleado;
        private $horaAlquiler;
        private $precioProducto;
        private $detalleCot;

        public function __construct($id_cotizacion=0, $fecha='', $duracion=0, $nombreCliente=0, $telefonoCliente=0, $direccionCliente=0, $tipoCliente=0, $productos=0, $nombreEmpleado=0, $horaAlquiler='', $precioProducto=0, $detalleCot=''){
            $this->id_cotizacion= $id_cotizacion;
            $this->fecha= $fecha;
            $this->duracion= $duracion;
            $this->nombreCliente= $nombreCliente;
            $this->telefonoCliente= $telefonoCliente;
            $this->direccionCliente= $direccionCliente;
            $this->tipoCliente= $tipoCliente;
            $this->productos= $productos;
            $this->nombreEmpleado= $nombreEmpleado;
            $this->horaAlquiler= $horaAlquiler;
            $this->precioProducto= $precioProducto;
            $this->detalleCot= $detalleCot;
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
        
        public function setDuracion($duracion) {
            $this->duracion = $duracion;
        }
    
        public function getDuracion() {
            return $this->duracion;
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

        public function setDireccionCliente($direccionCliente) {
            $this->direccionCliente = $direccionCliente;
        }
    
        public function getDireccionCliente() {
            return $this->direccionCliente;
        }

        public function setTipoCliente($tipoCliente) {
            $this->tipoCliente = $tipoCliente;
        }
    
        public function getTipoCliente() {
            return $this->tipoCliente;
        }

        public function setProductos($productos) {
            $this->productos = $productos;
        }
    
        public function getProductos() {
            return $this->productos;
        }

        public function setNombreEmpleado($nombreEmpleado) {
            $this->nombreEmpleado = $nombreEmpleado;
        }
    
        public function getNombreEmpleado() {
            return $this->nombreEmpleado;
        }

        public function setHoraAlquiler($horaAlquiler) {
            $this->horaAlquiler = $horaAlquiler;
        }
    
        public function getHoraAlquiler() {
            return $this->horaAlquiler;
        }

        public function setPrecioProducto($precioProducto) {
            $this->precioProducto = $precioProducto;
        }
    
        public function getPrecioProducto() {
            return $this->precioProducto;
        }

        public function setDetalleCot($detalleCot) {
            $this->detalleCot = $detalleCot;
        }
    
        public function getDetalleCot() {
            return $this->detalleCot;
        }

        public function obtenerClienteId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT id_cliente,nombreCliente,telefonoCliente,direccion,tipoCliente FROM clientes");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtenerEmpleadoId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT id_empleado,nombre FROM empleados");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtenerProductoId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT id_productos,nombreProducto, costoDia FROM productos");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function insertData (){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO cotizacion( fecha, duracion, nombreCliente, telefonoCliente, direccionCliente, tipoCliente, productos, nombreEmpleado, horaAlquiler, precioProducto, detalleCot ) VALUES (:fecha,:duracion,:nombreCliente,:telefonoCliente,:direccionCliente,:tipoCliente,:productos,:nombreEmpleado,:horaAlquiler,:precioProducto,:detalleCot) ");
                $stm->bindParam(":fecha",$this->fecha);
                $stm->bindParam(":duracion",$this->duracion);
                $stm->bindParam(":nombreCliente",$this->nombreCliente);
                $stm->bindParam(":telefonoCliente",$this->telefonoCliente);
                $stm->bindParam(":direccionCliente",$this->direccionCliente);
                $stm->bindParam(":tipoCliente",$this->tipoCliente);
                $stm->bindParam(":productos",$this->productos);
                $stm->bindParam(":nombreEmpleado",$this->nombreEmpleado);
                $stm->bindParam(":horaAlquiler",$this->horaAlquiler);
                $stm->bindParam(":precioProducto",$this->precioProducto);
                $stm->bindParam(":detalleCot",$this->detalleCot);
                $stm->execute();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM cotizacion 
                INNER JOIN clientes ON cotizacion.nombreCliente = clientes.id_cliente 
                INNER JOIN empleados ON cotizacion.nombreEmpleado = empleados.id_empleado
                INNER JOIN productos ON cotizacion.productos = productos.id_productos");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM cotizacion WHERE id_cotizacion = :id");
                $stm->bindParam(":id",$this->id_cotizacion);
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM cotizacion WHERE id_cotizacion = :id");
                $stm->bindParam(":id",$this->id_cotizacion);
                $stm -> execute();
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE cotizacion SET fecha=:fecha, duracion=:duracion, nombreCliente=:nombreCliente, telefonoCliente=:telefonoCliente, direccionCliente=:direccionCliente, tipoCliente=:tipoCliente, productos=:productos, nombreEmpleado=:nombreEmpleado, horaAlquiler=:horaAlquiler, precioProducto=:precioProducto, detalleCot=:detalleCot  WHERE id_cotizacion=:id");
                $stm->bindParam(":id",$this->id_cotizacion);
                $stm->bindParam(":fecha",$this->fecha);
                $stm->bindParam(":duracion",$this->duracion);
                $stm->bindParam(":nombreCliente",$this->nombreCliente);
                $stm->bindParam(":telefonoCliente",$this->telefonoCliente);
                $stm->bindParam(":direccionCliente",$this->direccionCliente);
                $stm->bindParam(":tipoCliente",$this->tipoCliente);
                $stm->bindParam(":productos",$this->productos);
                $stm->bindParam(":nombreEmpleado",$this->nombreEmpleado);
                $stm->bindParam(":horaAlquiler",$this->horaAlquiler);
                $stm->bindParam(":precioProducto",$this->precioProducto);
                $stm->bindParam(":detalleCot",$this->detalleCot);
                $stm-> execute();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>