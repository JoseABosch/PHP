<?php
return [
    'database' =>[
        'name' => 'libreria',
        'username' => 'userLibro',
        'password' => '1234',
        'connection' => 'mysql:host=dwes.local',
        'options' => [
            PDO:: MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
            PDO:: ATTR_PERSISTENT => true
        ]
    ],
    'security' => [
        'roles' => [
            'ROLE_ADMIN'=>3,
            'ROLE_USER'=>2,
            'ROLE_ANONIMO'=>1
        ]
    ],
    'switfmail' => [
        'smtp_server' => 'smtp.googlemail.com',
        'smtp_port' => '587',
        'smtp_security' => 'tls',
        'username' => 'josebosch@gmail.com',
        'password' => 'Carlitos84',
        'email' => 'josebosch84@gmail.com',
        'name' => 'Proyecto PHP'
    ]
];
