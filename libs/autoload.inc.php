<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 4/22/14
 * Time: 10:00 PM
 */


function autoload($classname)
{


    if (file_exists($file = dirname (__FILE__) . '/' . $classname .'.class.php'))
        require_once $file;
}

spl_autoload_register('autoload');
