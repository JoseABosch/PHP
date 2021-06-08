<?php

namespace JOSE\core;

use JOSE\core\database\QueryBuilder;
use Exception;

class App
{
    private static $container = [];

    public static function bind(string $key, $value)
    {
        static::$container[$key] = $value;
    }

    public static function get(string $key)
    {
        if (!array_key_exists($key, static::$container)) {
            throw new Exception("No se ha encontrado la clave $key en el contenedor");
        }
        return static::$container[$key];
    }

    public static function getRepository(string $repositoryName) : QueryBuilder
    {
        if (!isset(static::$container['repository']))
            static::$container['repository'] = [];

        if (!isset(static::$container['repository'][$repositoryName]))
            static::$container['repository'][$repositoryName] = new $repositoryName();

        return static::$container['repository'][$repositoryName];
    }
}