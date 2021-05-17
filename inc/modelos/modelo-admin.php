<?php
$accion = $_POST['accion'];
$password = $_POST['password'];
$usuario = $_POST['usuario'];


if ($accion === 'crear') {
    // Código para crear los administradores

    //Hashear Password
    $opciones = array(
        'cost' => 12
    );
    $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
    
    $respuesta = array(
        'pass' => $hash_password
    );
    
    //Importar la conexion
    include '../funciones/conexion.php';

    try {
        //Realiza la consulta a la base de datos.
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?,?)");
        $stmt->bind_param('ss', $usuario, $hash_password);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' =>'Correcto',
                'id_insertado' => $stmt->insert_id,
                'tipo' => $accion
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        //En caso de un error, toma la excepcion.
        $respuesta = array(
            'pass' => $e->getMessage()
        );
    }    
}

if ($accion === 'login') {
    // Código que inicia sesion
}

