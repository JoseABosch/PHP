<?php

use DWES\core\App;
use DWES\core\database\Connection;
use DWES\app\helpers\MyMail;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../app/config.php';
App:: bind ('config', $config);

App:: bind('connection', Connection:: make ($config['database']));

$mailer = new MyMail();
App::bind('mailer', $mailer);
