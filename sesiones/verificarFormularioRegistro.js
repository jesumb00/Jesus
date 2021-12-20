const form = document.getElementById("form");
const nombre = document.getElementById("inpNombreUsuario");
const apellidos = document.getElementById("inpApellidosUsuario");
const identificador = document.getElementById("inpIdentificadorUsuario");
const contrasenna = document.getElementById("inpContrasennaUsuario");
const contrasenna2 = document.getElementById("inpContrasenna2Usuario");

form.addEventListener('submit', (e) => {
    e.preventDefault();

    checkInputs();
});

function checkInputs() {
    //obtener los valores de los input y un trim para quitar los espacios
    const nombreValue= nombre.value.trim();
    const apellidosValue= apellidos.value.trim();
    const identificadorValue= identificador.value.trim();
    const contrasennaValue= contrasenna.value.trim();
    const contrasenna2Value= contrasenna2.value.trim();

    if(nombreValue === '' ) {
        setErrorFor(nombre, 'El usuario no puede estar en blanco');
    } else {
        setSuccessFor(nombre);
    }

    if(apellidosValue === '' ) {
        console.log(apellidosValue.lenght);
        setErrorFor(apellidos, 'Los apellidos no pueden estar en blanco');
    } else {
        setSuccessFor(apellidos);
    }

    if (identificadorValue === '') {
        setErrorFor(identificador, 'EL identificador no puede estar en blanco');
    } else {
        setSuccessFor(identificador);
    }

    if(contrasennaValue == ''){
        setErrorFor(contrasenna, 'La contraseña no puede estar vacía');
    } else {
        setSuccessFor(contrasenna);
    }

    if(contrasenna2Value == ''){
        setErrorFor(contrasenna2, 'La contraseña no puede estar vacía');
    } else if( contrasenna2Value != contrasennaValue) {
        setErrorFor(contrasenna2, 'Las contraseñas no coinciden');
    } else {
        setSuccessFor(contrasenna2);
    }

}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');

    small.innerText = message;
    formControl.className= "form-control error";
}

function setSuccessFor(input) {
    const formControl= input.parentElement;
    formControl.className= 'form-control success';
}

