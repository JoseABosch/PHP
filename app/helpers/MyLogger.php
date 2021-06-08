<?php

namespace JOSE\app\helpers;
use Monolog;

class MyLogger
{
    const LOG_FILE_PATH = '/home/jose/proyectos/dwes.local/logs/log.log';

    public static function createLog(string $mensaje)
    {
        $log = new Monolog\Logger('name');
        $log->pushHandler(
            new Monolog\Handler\StreamHandler(
                self::LOG_FILE_PATH,
                Monolog\Logger::INFO
            )
        );

        $log->info($mensaje);
    }
}