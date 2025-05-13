// Obtener el objeto formulario del html
const formInsert = document.forms['formInsert']

formInsert.addEventListener('submit', (e) =>{
    e.preventDefault();
    document.getElementById('errorUsuario').innerHTML = ""
    document.getElementById('errorColor').innerHTML =""

    // Obtener los dfatos del formulario
    const usuario = formInsert['usuario'].value.trim()
    const color = formInsert['color'].value.trim()
    const web = formInsert['web'].value
    const token = formInsert['token'].value

    const mensajeError = "<p>contenido requerido</p>"
    // Validar si usuario y/o color entan vacios

    if (usuario === '' && color === '') {
        document.getElementById('errorUsuario').innerHTML = mensajeError
        document.getElementById('errorColor').innerHTML = mensajeError
        return
    }

    if (usuario === '') {
        document.getElementById('errorUsuario').innerHTML = mensajeError        
        return
    }

    if (color === '') {
        document.getElementById('errorColor').innerHTML = mensajeError        
        return
    }

})
