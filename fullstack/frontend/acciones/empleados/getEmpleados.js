import {getEmpleado} from "./accionEmpleados.js"
addEventListener('DOMContentLoaded', cargarEmpleados);
async function cargarEmpleados() {
    const tabaEmpleados = document.querySelector('#tabla');
    const empleado = await getEmpleado();
    console.log(empleado);
    empleado.forEach(element => {
        tabaEmpleados.innerHTML+=`
        <tr>
          <td>${element.id_empleado}</td>
          <td>${element.nombre}</td>
          <td>${element.edad}</td>
          <td>${element.telefono}</td>
          <td>${element.email}</td>
          <td>${element.fechaIngreso}</td>
          <td>${element.cargo}</td>
          <td class="row gap-2 col-12">
            <a class="btn btn-danger" href="../backend/acciones/empleados/borrarEmpleado.php?id=<?= $value['id_empleado'] ?>&req=delete">BORRAR</a>
            <a class="btn btn-primary" href="../backend/acciones/empleados/editarEmpleado.php?id=<?=$value['id_empleado']?>">Editar</a>
          </td>
        </tr>
        `;
    });
};
