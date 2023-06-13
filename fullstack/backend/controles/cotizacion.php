<?php 

header('Content-Type: application/json');

require_once("../config/conectar.php");
require_once("../models/cotizaciones.php");


$cotizacion=new Cotizacion();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$cotizacion->get_cotizacion();
       echo json_encode($datos);
    break;

    case "GetId":

        $datos=$cotizacion->getIdCotizacion($body["id_cotizacion"]);
        echo json_encode($datos);
  
    break;


    case "insert":

        $datos=$cotizacion->insertCotizacion($body["id_cotizacion"], $body["fecha"],$body["duracion"],$body["nombreCliente"] ,$body["telefonoCliente"] ,$body["direccionCliente"], $body["tipoCliente"] , $body["productos"] , $body["nombreEmpleado"] , $body["horaAlquiler"] , $body["precioProducto"] , $body["detalleCot"] );
        echo json_encode("insertado correctamente");
  
      break;

    case "update":

        $datos=$cotizacion->updateCotizacion($body["id_cotizacion"], $body["fecha"],$body["duracion"],$body["nombreCliente"] ,$body["telefonoCliente"] ,$body["direccionCliente"], $body["tipoCliente"] , $body["productos"] , $body["nombreEmpleado"] , $body["horaAlquiler"] , $body["precioProducto"] , $body["detalleCot"] );
        echo json_encode("cotizacion actualizada correctamente");
  
    break;

    case "delete":

        $datos=$cotizacion->deleteCotizacion($body["id_cotizacion"]);
        echo json_encode("cotizacion eliminada correctamente");
  
      break;

}

    

?>
