<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/conectar.php");
class Empleados extends Conectar{

    public function get_empleados(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM empleados");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }
    public function getIdEmpleados($id_empleado){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM empleados WHERE id_empleado=?");
            $stm->bindValue(1,$id_empleado);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insertEmpleados($id_empleado, $nombre, $edad, $telefono,$email ,$fechaIngreso, $cargo){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO empleados(id_empleado, nombre, edad, telefono, email ,fechaIngreso, cargo) VALUES(?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$id_empleado);
        $stm->bindValue(2,$nombre);
        $stm->bindValue(3,$edad);
        $stm->bindValue(4,$telefono);
        $stm->bindValue(5,$email);
        $stm->bindValue(6,$fechaIngreso);
        $stm->bindValue(7,$cargo);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    public function updateEmpleados($id_empleado, $nombre, $edad, $telefono,$email ,$fechaIngreso, $cargo){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="UPDATE empleados set nombre=?, edad=?, telefono=?, email=?,fechaIngreso=?, cargo=?) WHERE id_empleado=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$nombre);
        $sql->bindValue(2,$edad);
        $sql->bindValue(3,$telefono);
        $sql->bindValue(4,$email);
        $sql->bindValue(5,$fechaIngreso);
        $sql->bindValue(6,$cargo);
        $sql->bindValue(7,$id_empleado);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


    }
    
    public function deleteEmpleados($id_empleado){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM empleados WHERE id_empleado=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_empleado);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>