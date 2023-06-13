const ulr = "http://localhost/SkylAb-145/Proyects/simulacro/fullstack/backend/controles/empleado.php?op=GetAll"


export const getEmpleado = async () =>{
    try{
        const result = await fetch (ulr);
        const datosUsuarios = await result.json();
        return datosUsuarios;
        
    }
    catch(error){
        console.log(error);
    }
}

export const newEmpleado = async (registro) =>{
    console.log(registro);
    try {
        await fetch(ulr,{
            method: 'POST',
            body: JSON.stringify(registro),
            headers:{
                'Content-Type': 'application/json'
            }

        });
        // window.location.href='index.html'

    } catch (error) {
        console.log(error);
    }
}


export const deleteEmpleado = async id_empleado => {
    try {
       await fetch (`${ulr}/${id_empleado}`,{
            method: 'DELETE'
       })
        
    } catch (error) {
        console.log(error);
        
    }


}

export const actualizarEmpleado = async (data) => {
    try {
      await fetch(ulrEmpleado + '/' + data.id_empleado, {
        method: 'PATCH',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      })
        .then(response => response.json())
        .then(updatedData => {
          console.log('Datos actualizados:', updatedData);
          // Realiza las acciones necesarias con los datos actualizados
        })
    } catch (error) {
      console.error('Error al actualizar los datos:', error);
    }
  }


