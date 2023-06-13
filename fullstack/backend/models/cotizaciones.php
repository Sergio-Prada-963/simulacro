<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/conectar.php");
class Cotizacion extends Conectar{

    public function get_cotizacion(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM cotizacion");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }
    public function getIdCotizacion($id_cotizacion){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM cotizacion WHERE id_cotizacion=?");
            $stm->bindValue(1,$id_cotizacion);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insertCotizacion($id_cotizacion, $fecha, $duracion, $nombreCliente, $telefonoCliente, $direccionCliente, $tipoCliente, $productos, $nombreEmpleado, $horaAlquiler, $precioProducto, $detalleCot){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO cotizacion(id_cotizacion, fecha, duracion, nombreCliente, telefonoCliente, direccionCliente, tipoCliente, productos, nombreEmpleado, horaAlquiler, precioProducto, detalleCot) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$id_cotizacion);
        $stm->bindValue(2,$fecha);
        $stm->bindValue(3,$duracion);
        $stm->bindValue(4,$nombreCliente);
        $stm->bindValue(5,$telefonoCliente);
        $stm->bindValue(6,$direccionCliente);
        $stm->bindValue(7,$tipoCliente);
        $stm->bindValue(8,$productos);
        $stm->bindValue(9,$nombreEmpleado);
        $stm->bindValue(10,$horaAlquiler);
        $stm->bindValue(11,$precioProducto);
        $stm->bindValue(12,$detalleCot);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    public function updateCotizacion($id_cotizacion, $fecha, $duracion, $nombreCliente, $telefonoCliente, $direccionCliente, $tipoCliente, $productos, $nombreEmpleado, $horaAlquiler, $precioProducto, $detalleCot){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="UPDATE cotizacion set fecha=?, duracion=?, nombreCliente=?, telefonoCliente=?, direccionCliente=?, tipoCliente=?, productos=?, nombreEmpleado=?, horaAlquiler=?, precioProducto=?, detalleCot=?  WHERE id_cotizacion=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$fecha);
        $sql->bindValue(2,$duracion);
        $sql->bindValue(3,$nombreCliente);
        $sql->bindValue(4,$telefonoCliente);
        $sql->bindValue(5,$direccionCliente);
        $sql->bindValue(6,$tipoCliente);
        $sql->bindValue(7,$productos);
        $sql->bindValue(8,$nombreEmpleado);
        $sql->bindValue(9,$horaAlquiler);
        $sql->bindValue(10,$precioProducto);
        $sql->bindValue(11,$detalleCot);
        $sql->bindValue(12,$id_cotizacion);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


    }
    
    public function deleteCotizacion($id_cotizacion){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM cotizacion WHERE id_cotizacion=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_cotizacion);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>