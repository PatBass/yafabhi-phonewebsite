<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 6/28/14
 * Time: 5:55 PM
 */

// Inclusion du fichier de configuration (qui définit les constantes)

include_once "config.php";
include_once "../libs/autoload.inc.php";
$pdo = new PDO2(SQL_DSN, SQL_USERNAME, SQL );

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Désactivation des guillemets magiques

ini_set('magic_quotes_runtime', 0);

//set_magic_quotes_runtime(0);

if (1 == get_magic_quotes_gpc())
{
    function remove_magic_quotes_gpc(&$value)
    {
        $value = stripslashes($value);
    }
    array_walk_recursive($_GET, 'remove_magic_quotes_gpc');
    array_walk_recursive($_POST, 'remove_magic_quotes_gpc');
    array_walk_recursive($_COOKIE, 'remove_magic_quotes_gpc');
}

// Inclusion de Pdo2, potentiellement utile partout