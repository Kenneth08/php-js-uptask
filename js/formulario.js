eventListener();

function eventListener() {
    document.querySelector('#formulario').addEventListener('submit', validarRegistro);
}

function validarRegistro(e) {
    e.preventDefault();
    var usuario = document.querySelector('#usuario').value,
        password = document.querySelector('#password').value,
        tipo = document.querySelector('#tipo').value

    if (usuario === '' || password === '') {
        //Validacion falló
        swal({
            type: 'error',
            title: 'Error!',
            text: 'Ambos espacios son obligatorios!'
        })
    } else {
        //Ambos campos son correctos, llamado a AJAX

        //Datos que se envian al servidor
        var datos = new FormData();
        datos.append('usuario', usuario);
        datos.append('password', password);
        datos.append('accion', tipo);

        // Procedimiento de AJAX
        // 1-Crear llamado
        var xhr = new XMLHttpRequest();
        // 2-Abrir la conexion
        xhr.open('POST', 'inc/modelos/modelo-admin.php', true);
        // 3-Retorno de los datos
        xhr.onload = function() {
            if (this.status === 200) {
                //console.log(JSON.parse(xhr.responseText))
                console.log('Conexion exitosa');
            } else if (this.status === 500) {
                console.log('Error en la conexion');
            }
        }

        // 4-Enviar la petición
        xhr.send(datos);

    }
}