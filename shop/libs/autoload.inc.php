<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 5/27/14
 * Time: 7:23 PM
 */

function autoload($classname)
{


    if (file_exists($file = dirname (__FILE__) . '/' . $classname .'.class.php'))
        require_once $file;
}

spl_autoload_register('autoload');