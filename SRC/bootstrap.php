<?php

namespace src;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', strtolower($_SERVER['DOCUMENT_ROOT']) . DS);
\session_start();
//var_dump(ROOT);

class Autoloader
{

    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class)
    {

        $parts = preg_split('#\\\#', $class);

        $className = array_pop($parts);

        array_shift($parts);

        $path = implode(DS, $parts);

        $file = $className . '.php';

        $filepath = $path . DS . $file;

        //var_dump(ROOT.$filepath);

        require ROOT . $filepath;
    }
}
