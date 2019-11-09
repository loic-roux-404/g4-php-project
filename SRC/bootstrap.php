<?php

namespace SRC;

define('DS', DIRECTORY_SEPARATOR);
define('MAIN_DIR', $_SERVER['DOCUMENT_ROOT']);
define('ROOT', MAIN_DIR . DS);
define('VF', ROOT . 'Views/');
define('VFP', ROOT . 'Views/partials/');
define('URI', $_SERVER['REQUEST_URI']);
define('DOM', $_SERVER['SERVER_NAME']);
/**
 * Autoloader class :  Automatic load classes by namespace
 *
 * @package Autoloader
 * @link    loicroux.fr
 */
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

        include ROOT . $filepath;
    }
}
/**
 * Reset programmaticly globals variables
 * @return void
 */
function reset_globs()
{
    $_POST = array();
    $_GET = array();
}

/**
 * Better var_dump function
 * @param [mixed] $var to debug
 */
function dump($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}
