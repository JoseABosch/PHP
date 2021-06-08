<?php

$errores = [];
$mensaje = '';
$nombre = '';
$apellidos = '';
$email = '';
$asunto = '';
$texto = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $apellidos = trim(htmlspecialchars($_POST['apellidos']));
    $email = trim(htmlspecialchars($_POST['email']));
    $asunto = trim(htmlspecialchars($_POST['asunto']));
    $texto = trim(htmlspecialchars($_POST['texto']));

    if (empty($nombre))
        $errores[] = "El nombre no puede estar vacío.";

    if (empty($email))
        $errores[] = "El email no puede estar vacío.";
    else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
            $errores[] = "Email no válido.";
    }

    if (empty($asunto))
        $errores[] = "El asunto no puede estar vacío.";

    if (empty($errores)) {
        require_once 'database/Connection.php';
        $config = require_once 'config.php';
        $connection = Connection::make($config['database']);

        $sql = "INSERT INTO mensajes (nombre, apellidos, email, asunto, texto) values ('$nombre', '$apellidos', '$email', '$asunto', '$texto')";

        if ($connection->exec($sql) === false)
            $errores[] = 'Error al guardar el mensaje.';

        else
            $mensaje = "Enviado correctamente.";
    }
    $mensaje = "Los datos son correctos";
}

require __DIR__ . '/../views/contact.view.php';
?>