import {getCotizacion} from "./AccionCotizacion.js"
addEventListener('DOMContentLoaded', cargarCotizacion);
async function cargarCotizacion() {
    const tabaCotizacion = document.querySelector('#tabla');
    const cotizaciones = await getCotizacion();
    console.log(cotizaciones);
    cotizaciones.forEach(element => {
        tabaCotizacion.innerHTML+=`
        <tr>
            <td>${element.id_cotizacion}</td>
            <td>${element.fecha}</td>
            <td>${element.nombreCliente}</td>
            <td>${element.nombreEmpleado}</td>
            <td>${element.productos}</td>
            <td><button type="button" name="detalles" class="BOTON<?= ++$i; ?> btn btn-primary" idCot="<?= $value['id_cotizacion'] ?>" >Opciones</button></td>
            <td class="OPCIONES<?= $i; ?> ">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DetallesCotizacion<?= $i; ?>">Detalles</button>
              <a class="btn btn-danger" href="../backend/acciones/cotizacion/borrarCotizacion.php?id=<?= $value['id_cotizacion'] ?>&req=delete">BORRAR</a>
              <a class="btn btn-primary" href="../backend/acciones/cotizacion/editarCotizacion.php?id=<?=$value['id_cotizacion']?>">Editar</a>
            </td>
        </tr>`;
    });
};
