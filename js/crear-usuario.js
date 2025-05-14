// Capturar el objeto formulario
const formNewUser = document.forms['formNewUser']

formNewUser.addEventListener('submit', (evento) => {
    evento.preventDefault();

    let nombre = formNewUser['nombre'].value.trim()
    let password = formNewUser['password'].value.trim()
    let password2 = formNewUser['password2'].value.trim()
    let idioma = formNewUser['idioma'].value
    let email = formNewUser['email'].value.trim()

    console.log(nombre,password, password2,idioma,email);

})