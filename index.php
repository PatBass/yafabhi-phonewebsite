<?php
//session_start();


//include 'libs/DBFactory.class.php';
require_once 'libs/autoload.inc.php';
require_once 'modeles/autoload.inc.php';
$db = DBFactory::getMysqlConnexionWithPDO();


$manager_contact = new ContactManager_PDO($db);
/*
$manager_membre = new MembreManager($db);
$manager_inscription_perso = new InscriptionPersoManager($db);
$manager_inscription_ets = new InscriptionEtsManager($db);

function membre_connecte()
{
return !empty($_SESSION['id']);
}

function admin_actu_connecte()
{
return !empty($_SESSION['id_admin']);
}
*/

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


