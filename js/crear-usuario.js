// Capturar el objeto formulario
const formNewUser = document.forms['formNewUser']

formNewUser.addEventListener('submit', (evento) => {
    evento.preventDefault();

    document.getElementById("errorUsuario").textContent = "";
    document.getElementById("errorPassword").textContent = "";
    document.getElementById("errorEmail").textContent = "";

    let nombre = formNewUser['nombre'].value.trim()
    let password = formNewUser['password'].value.trim()
    let password2 = formNewUser['password2'].value.trim()
    let idioma = formNewUser['idioma'].value
    let email = formNewUser['email'].value.trim()

    console.log(nombre,password, password2,idioma,email);


    const mensajeError = "Contenido requerido";
    if (nombre === "" && password === "" && password2 === "" && email === "") {
    document.getElementById("errorUsuario").textContent = mensajeError;
    document.getElementById("errorPassword").textContent = mensajeError;
    document.getElementById("errorEmail").textContent = mensajeError;
    return;
  }
  if (nombre === "") {
    document.getElementById("errorUsuario").textContent = mensajeError;
    return;
  }
  if (password === "" || password2 === "") {
    document.getElementById("errorPassword").textContent = mensajeError;
    return;
  }

   if (email === "") {
    document.getElementById("errorEmail").textContent = mensajeError;
    return;
  }

  // Si las 2 contraseñas no coinciden

  if(password !== password2) {
    document.getElementById("errorPassword").textContent = "Las contraseñas no coinciden";
  }

  // Comprobación por REGEX
  
})