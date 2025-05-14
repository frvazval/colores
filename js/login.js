// Capturar el objeto formulario
const formLogin = document.forms['formLogin']

formLogin.addEventListener('submit', (evento) => {
    evento.preventDefault();

    document.getElementById("errorUsuario").textContent = "";
    document.getElementById("errorPassword").textContent = "";
    

    let nombre = formLogin['nombre'].value.trim()
    // Pendiente corregir nombre
    let password = formLogin['password'].value.trim()
    

    

    const mensajeError = "Contenido requerido";
    if (nombre === "" && password === "") {
    document.getElementById("errorUsuario").textContent = mensajeError;    
    return;
  }
  if (nombre === "") {
    document.getElementById("errorUsuario").textContent = mensajeError;
    return;
  }
  if (password === "") {
    document.getElementById("errorPassword").textContent = mensajeError;
    return;
  }

   

  
  // Comprobación por REGEX

  // Enviar datos a acceso.php
  const datos = new URLSearchParams();
  datos.append("nombre", nombre);
  datos.append("password", password);  

  fetch("../controlador/login.php",{
    "method": "POST",
    "body": datos.toString(),
    "headers": {
        "Content-type":"application/x-www-form-urlencoded"
    }
  })

  .then(respuesta => respuesta.text())
  .then(data => {
    console.log(data);
    // location.reload()
  }).catch(error => {
    console.log("Error: ", error);
  })

});
