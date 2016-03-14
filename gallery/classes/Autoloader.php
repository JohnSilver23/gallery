<?php


class Autoloader
{

    public static function register()
    {
        spl_autoload_register(function($class){
            $basedir = dirname(__FILE__);
            $path = $basedir . DIRECTORY_SEPARATOR . $class . '.php';
            if(file_exists($path))
            {
                require $path;
            }
        });
    }
}

$autoloader = new autoloader();
$autoloader->register();
session_start();
