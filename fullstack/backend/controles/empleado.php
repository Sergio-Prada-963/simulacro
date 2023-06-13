<?php 


header('Content-Type: application/json');

require_once("../config/conectar.php");
require_once("../models/empleados.php");


$empleados=new Empleados();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$empleados->get_empleados();
       echo json_encode($datos);
    break;

    case "GetId":

        $datos=$empleados->getIdEmpleados($body["id_empleado"]);
        echo json_encode($datos);
  
    break;


    case "insert":

        $datos=$empleados->insertEmpleados($body["id_empleado"], $body["nombre"],$body["edad"],$body["telefono"] ,$body["email"] ,$body["fechaIngreso"], $body["cargo"]);
        echo json_encode("insertado correctamente");
  
      break;

    case "update":

        $datos=$empleados->updateEmpleados($body["id_empleado"], $body["nombre"],$body["edad"],$body["telefono"] ,$body["email"] ,$body["fechaIngreso"], $body["cargo"]);
        echo json_encode("empleados actualizada correctamente");
  
    break;

    case "delete":

        $datos=$empleados->deleteEmpleados($body["id_empleado"]);
        echo json_encode("empleados eliminada correctamente");
  
      break;

}

    

?>
