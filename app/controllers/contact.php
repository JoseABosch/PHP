<?php

$errores=[];
$mensaje = '';
$nombre='';
$apellidos='';
$email='';
$asunto='';
$texto='';

if ($_SERVER['REQUEST_METHOD']==='POST')
{

    $nombre=trim(htmlspecialchars($_POST['nombre']));
    $apellidos=trim(htmlspecialchars($_POST['apellidos']));
    $email=trim(htmlspecialchars($_POST['email']));
    $asunto=trim(htmlspecialchars($_POST['asunto']));
    $texto=trim(htmlspecialchars($_POST['texto']));

    if(empty($nombre))
        $errores[] = "El nombre no se puede quedar vacío";

    if(empty($email))
        $errores[] = "El e-mail no se puede quedar vacío";
    else
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
            $errores[] = "El e-mail no es válido";
    }

    if(empty($asunto))
        $errores[] = "El asunto no se puede quedar vacío";

    if(empty($errores))
    {
        require_once 'database/Connection.php';
        $config = require_once 'config.php';
        $connection = Connection::make($config['database']);

        $sql = "INSERT INTO mensajes (nombre, apellidos, email, asunto, texto) values ('$nombre', '$apellidos', '$email', '$asunto', '$texto')";

        if($connection->exec($sql) === false)
            $errores[] = 'No se ha podido guardar el mensaje en la base de datos';

        else
            $mensaje = "Hemos recibido su mensaje";
    }
        $mensaje = "Los datos del formulario son correctos";
}

require __DIR__ . '/../views/contact.view.php';
?>