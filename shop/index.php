<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 5/25/14
 * Time: 12:16 PM
 */
session_start();

//include 'libs/DBFactory.class.php';  ====> the next is already doing the job!
require_once 'libs/autoload.inc.php';
require_once 'modeles/autoload.inc.php';
$db = DBFactory::getMysqlConnexionWithPDO();
$manager_log = new ConnectionManager_PDO($db);
$manager_order = new ManagerOrder_PDO($db);
$manager_product = new ManagerProduct_PDO($db);
$cart_management = new CartManagement();
//$manager_contact = new ContactManager_PDO($db);
/*
function membre_connecte()
{
    return !empty($_SESSION['id']);
}

function admin_actu_connecte()
{
    return !empty($_SESSION['id_admin']);
}

function membre_connecte()
{
return !empty($_SESSION['id']);
}
*/
function admin_connecte()
{
return !empty($_SESSION['id_admin']);
}

ob_start();



if(!empty($_GET['module']))
{
    $module = dirname(__FILE__).'/modules/'.$_GET['module'].'/';
    $action = (!empty($_GET['action'])) ? $_GET['action'].'.php' : 'index.php';

    if(is_file($module.$action))
    {
        include $module.$action;
    }
    else
    {
        include 'global/home.php';
    }

}
else
{
    include 'global/home.php';
}

$contenu = ob_get_clean();

include 'global/head.php';

echo $contenu;

include 'global/footer.php';


