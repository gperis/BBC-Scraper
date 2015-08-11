<?php


namespace App\Core;


abstract class Singleton
{
    /**
     * Instances variable.
     */
    protected static $instances = [];

    public static function getInstance()
    {
        $class = get_called_class();
        if (array_key_exists($class, self::$instances) === false) {
            self::$instances[$class] = new $class();
        }

        return self::$instances[$class];
    }
}