// ---------- VARIOS DE BASE/UTILIDADES ----------

window.onload = inicializar;
var usuariosInicio ;
var todosLosDatosCargados= false;

function notificarUsuario(texto) {
    // TODO En lugar del alert, habría que añadir una línea en una zona de notificaciones, arriba, con un temporizador para que se borre solo en ¿5? segundos.
    alert(texto);
}



function llamadaAjax(url, parametros, manejadorOK, manejadorError){
    var request = new XMLHttpRequest();

    request.open("POST", url);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange = function () {
        if (this.readyState == 4) { // 4 equivale a "hemos terminado".
            if (request.status == 200) { // 200 significa "todo bien".
                manejadorOK(request.responseText);

            } else {
                if (manejadorError != null) manejadorError(request.responseText);
            }
        }
    };

    request.send(parametros);
}

function extraerId(texto){
    return texto.split('-')[1];
}

function objetoAParametrosParaRequest(objeto) {
    // Esto convierte un objeto JS en un listado de clave1=valor1&clave2=valor2&clave3=valor3
    return new URLSearchParams(objeto).toString();
}



// ---------- MANEJADORES DE EVENTOS / COMUNICACIÓN CON PHP ----------
function inicializar() {
    btnCrear.onclick= clickCrear;
    btnCerrarSesion.onclick = clickCerrarSesion;

    llamadaAjax("usuariosObtenerTodos.php", "",
        function (texto){
            usuariosInicio = JSON.parse(texto);

            for (var i=0; i < usuariosInicio.length; i++){
                domInsertar(usuariosInicio[i]);
            }
            todosLosDatosCargados = true;
        },
        function (texto){
            notificarUsuario("Error ajax al cargar la inicialización: " + texto);
        }
    );
}

function clickCerrarSesion() {
    $.ajax({
        type: 'POST',
        url: '../sesiones/SesionCerrar.php',
        data: {'clickCerrar': true},
    })
        .done(function (resultado) {
            // $('#result').html(resultado)
            window.location.href = "../sesiones/SesionFormulario.php";
        })
        .fail(function () {
            alert('Hubo un error al cerrar sesión');
        })
}

function clickCrear(){

    inpNombre.disabled = true;
    inpApellidos.disabled = true;
    inpIdentificador.disabled = true;
    inpContrasenna.disabled = true;

    let usuario = {
        "id" : -1,
        "identificador" : inpIdentificador.value,
        "contrasenna" : inpContrasenna.value,
        "nombre" : inpNombre.value,
        "apellidos" : inpApellidos.value
    }


    llamadaAjax("usuarioCrear.php", objetoAParametrosParaRequest(usuario),
        function (texto){
        var usuario = JSON.parse(texto);

        domInsertar(usuario, true);

            inpNombre.value = "";
            inpNombre.disabled = false;
            inpApellidos.value = "";
            inpApellidos.disabled = false;
            inpIdentificador.value = "";
            inpIdentificador.disabled = false;
            inpContrasenna.value = "";
            inpContrasenna.disabled = false;
        },
        function (texto){
            notificarUsuario("Error Ajax al crear: " + texto);
            inpNombre.disabled = false;
            inpApellidos.disabled = false;
            inpIdentificador.disabled = false;
            inpContrasenna.disabled = false;
        })
}

function blurModificar(input){

    let div = input.parentElement.parentElement;
    let usuario = domDivAObjeto(div);
    console.log(div)
    console.log(objetoAParametrosParaRequest(usuario));
    let obj = {
        "id": extraerId(div.id),
        "identificador": div.children[0].children[0].value,
        "nombre": div.children[1].children[0].value,
        "apellidos": div.children[2].children[0].value,
        "tipo" : div.children[3].children[0].value,
    }
    console.log(obj);
    //id=2&identificador=mgarcia&nombre=Maria&apellidos=Garcia&tipo=CLWEB
    llamadaAjax("usuarioActualizar.php", objetoAParametrosParaRequest(usuario),
        function (texto) {
    console.log(texto);
            if (texto != "null") {
                usuario = JSON.parse(texto);
                domModificar(usuario);
            } else {
                notificarUsuario("Error Ajax al modificar: 1 " + texto);
            }
        },
        function (texto){
            notificarUsuario("Error Ajax al modificar:2 " + texto);
        }
    );

}



function clickEliminar(id) {

    llamadaAjax("usuarioEliminar.php", "id=" + id,
        function (texto) {
            var operacionOK = JSON.parse(texto);

            debugger;
            if (operacionOK == "NOSESION") {
                alert("Nos vamos, porque no hay sesión.");
                window.location.href = "../sesiones/SesionFormulario.php";
                alert("No debería verse esto");
            }

            if (operacionOK) {
                domEliminar(id);
            } else {
                notificarUsuario("Error Ajax al eliminar: " + texto);
            }
        },
        function (texto) {

            notificarUsuario("Error Ajax al eliminar: " + texto);
        }
    );
}



// ---------- GESTIÓN DEL DOM ----------

function domCrearDivInputText(textoValue, codigoOnblur) {
    let div = document.createElement("div");
    let input = document.createElement("input");

    input.setAttribute("type", "text");
    input.setAttribute("value", textoValue);
    input.setAttribute("onBlur", codigoOnblur + " return false;");
    div.appendChild(input);

    return div;
}


function domCrearDivIcon(clase, codigoOnclick) {
    let div = document.createElement("div");
    let i = document.createElement("i");

    i.setAttribute("class", clase);
    i.setAttribute("onclick", codigoOnclick + "return false;");
    div.appendChild(i);

    return div;
}

function domObjetoADiv(usuario){
    let div = document.createElement("div");
    div.setAttribute("id", "usuario-" + usuario.id);
    div.appendChild(domCrearDivInputText(usuario.identificador, "blurModificar(this);"));
    div.appendChild(domCrearDivInputText(usuario.nombre, "blurModificar(this);"));
    div.appendChild(domCrearDivInputText(usuario.apellidos, "blurModificar(this);"));
    div.appendChild(domCrearDivInputText(usuario.tipoUsuario, "blurModificar(this);"));
    div.appendChild(domCrearDivIcon("fa fa-trash", "clickEliminar("+ usuario.id + ");"));

    return div;
}

function domObtenerDiv(pos) {
    return divDatos.children[pos];
}

function domDivAObjeto(div) {
    return {
        "id": extraerId(div.id),
        "identificador": div.children[0].children[0].value,
        "nombre": div.children[1].children[0].value,
        "apellidos": div.children[2].children[0].value,
        "tipo" : div.children[3].children[0].value,
    }
}

function domObtenerObjeto(pos) {
    let div = domObtenerDiv(pos);
    return domDivAObjeto(div);
}

function domEjecutarInsercion(pos, usuario) {
    let divReferencia = domObtenerDiv(pos);
    let divNuevo = domObjetoADiv(usuario);

    divDatos.insertBefore(divNuevo, divReferencia);
}

function domInsertar (usuarioNuevo, enOrden = false) {
    if (enOrden){
        for (let pos=0; pos < divDatos.children.length; pos++) {
            let usuarioActual = domObtenerObjeto(pos);
            let cadenaActual = usuarioActual.identificador + usuarioActual.nombre + usuarioActual.apellidos + usuarioActual.tipoUsuario;
            let cadenaNueva = usuarioActual.identificador + usuarioActual.nombre + usuarioActual.apellidos + usuarioActual.tipoUsuario;

            if (cadenaNueva.localeCompare(pos, usuarioNuevo) == -1) {
                domEjecutarInsercion(pos, usuarioNuevo);
                return;
            }

        }
    }

    domEjecutarInsercion(divDatos.children.length, usuarioNuevo);
}

function domLocalizarPosicion(idBuscado) {
    var divs = divDatos.children;

    for (var pos=0; pos < divs.length; pos++) {
        let div = divs[pos];
        let usuarioActualId = extraerId(div.id);

        if (usuarioActualId == idBuscado) return (pos);
    }

    return -1;
}

function domModificar(usuario) {
    domEliminar(usuario.id);

    // Se fuerza la ordenación, ya que este elemento podría no quedar ordenado si se pone al final.
    domInsertar(usuario, true);
}

function domEliminar(id) {
    let pos = domLocalizarPosicion(id);
    let div = domObtenerDiv(pos);
    div.remove();
}


function evento(){
    document.getElementById("btnCrearUsuario").addEventListener("click", mostrarVentanaCrearUsuario);
    document.getElementById("iconoX").addEventListener("click", cerrarVentanaCrearUsuario);
}

document.addEventListener("readystatechange", evento);

function mostrarVentanaCrearUsuario(){
    document.getElementById("crearUsuario").style.display = "block";
}

function cerrarVentanaCrearUsuario(){
    document.getElementById("crearUsuario").style.display = "none";
}











