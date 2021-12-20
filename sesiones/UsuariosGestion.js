
window.onload = inicializar;

function notificarUsuario(texto) {
    // TODO En lugar del alert, habría que añadir una línea en una zona de notificaciones, arriba, con un temporizador para que se borre solo en ¿5? segundos.
    alert(texto);
}

// TODO El parametro "parametros" podía ser directamente un objeto JS y lo convertimos dentro de esta función, en lugar de que lo convierta desde fuera el llamante.
function llamadaAjax(url, parametros, manejadorOK, manejadorError) {
    //TODO PARA DEPURACIÓN: alert("Haciendo ajax a " + url + "\nCon parámetros " + parametros);

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

function extraerId(texto) {
    return texto.split('-')[1];
}

function objetoAParametrosParaRequest(objeto) {
    // Esto convierte un objeto JS en un listado de clave1=valor1&clave2=valor2&clave3=valor3
    return new URLSearchParams(objeto).toString();
}

function debug() {
    // Esto es útil durante el desarrollo para programar el disparado de acciones concretas mediante un simple botón.
}


// ---------- MANEJADORES DE EVENTOS / COMUNICACIÓN CON PHP ----------

// TODO Estaría genial que estos métodos no metieran la mano para nada en el DOM, sino que lo hicieran todo a través de métodos domTalCosa:
// Por ejemplo: disablearCamposPersonaCrear(), enablearCamposPersonaCrear(), obtenerObjetoPersonaDeCamposPersonaCrear()...

function inicializar() {
    btnRegistroUsuario.onclick = clickRegistrar();

    llamadaAjax("ProductoObtenerTodos.php", "",
        function (texto) {
            var productos = JSON.parse(texto);

            for (var i = 0; i < productos.length; i++) {
                domInsertar(productos[i]);
            }
        },
        function (texto) {
            alert(productos);
            notificarUsuario("Error Ajax al cargar al inicializar: " + texto);
        }
    );
}

function clickRegistrar() {
/*    inpNombreUsuario.disabled = true;
    inpApellidosUsuario.disabled = true;
    inpIdentificadorUsuario.disabled = true;
    inpContrasennaUsuario.disabled = true;*/

    llamadaAjax("UsuarioCrear.php", "nombre=" + inpNombreUsuario.value + "apellidos=" + inpApellidosUsuario.value
        + "identificador=" + inpIdentificadorUsuario.value + "contrasenna=" + inpContrasennaUsuario.value,
        function (texto) {
            // Se re-crean los datos por si han modificado/normalizado algún valor en el servidor.
            //var usuario = JSON.parse(texto);

            //inpNombre.value = "";
            //inpNombre.disabled = false;
        },
        function (texto) {
            notificarUsuario("Error Ajax al crear usuario: " + texto);
            //inpNombre.disabled = false;
        }
    );
}
