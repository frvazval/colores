// Obtener el objeto formulario del html
const formInsert = document.forms['formInsert']

formInsert.addEventListener('submit', (e) =>{
    e.preventDefault();
    document.getElementById('errorUsuario').innerHTML = ""
    document.getElementById('errorColor').innerHTML =""

    // Obtener los dfatos del formulario
    const usuario = formInsert['usuario'].value.trim()
    const color = formInsert['color'].value.trim().toLocalelowerCase()
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


    // Comprobación del Bot
    if (web !== "") {
        document.getElementById('errorColor').innerHTML = "Bot Detectado"
    }
        
    
    // Comprobación REGEX = REGular Expresions
    


    // Enviar datos a insert.php por POST
    const datos = new URLSearchParams()
    datos.append("usuario", usuario)
    datos.append("color", color)
    datos.append("token", token)
    datos.append("web", web)

    fetch("../insert.php", {
        "method":"POST",
        "body":datos.toString(),
        "headers": {
            "Content-type":"application/x-www-form-urlencoded"
        }
    })
    .then(respuesta => respuesta.text())
    .then(data => {
        console.log(data);
        location.reload()
    }).catch(error => {
        console.log("error: ", error);
    })
    
});
