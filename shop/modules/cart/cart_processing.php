<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 9/7/14
 * Time: 11:44 PM
 */

if(isset($_GET['cmd']) && $_GET['cmd']=="emptyCard")
{
    unset($_SESSION['cart_array']);
}

$error = false;

$op = (isset($_POST['op'])? $_POST['op']:  (isset($_GET['op'])? $_GET['op']:null )) ;
if($op !== null)
{
    if(!in_array($op,array('ajout', 'suppression', 'refresh')))
        $error=true;

    //récuperation des variables en POST ou GET
    $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
    $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
    $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
    $pic = (isset($_POST['pic'])? $_POST['pic']:  (isset($_GET['pic'])? $_GET['pic']:null )) ;

    //Suppression des espaces verticaux
    $l = preg_replace('#\v#', '',$l);
    //On verifie que $p soit un float
    $p = floatval($p);

    //On traite $q qui peut etre un entier simple ou un tableau d'entier

    if (is_array($q)){
        $QteArticle = array();
        $i=0;
        foreach ($q as $contenu){
            $QteArticle[$i++] = intval($contenu);
        }
    }
    else
        $q = intval($q);

}

if (!$error)
{
    if(isset($_GET['id']))
    {
        $productObject= $manager_product->getUnique($_GET['id']);
        $p=$productObject->price();
        $l=$productObject->title();
        $p = floatval($p);
        $pic=$productObject->image();
    }

    switch($op){
        Case "ajout":
            $cart_management->addProduct($l,$q,$p, $pic);
            break;

        Case "suppression":
            $cart_management->deleteProduct($l);
            break;

        Case "refresh" :
            for ($i = 0 ; $i < count($QteArticle) ; $i++)
            {
                $cart_management->updateProductQuantity($_SESSION['cart_array']['title'][$i], round($QteArticle[$i]));
            }

            break;

        Default:
            break;
    }
}

if(!isset($_GET['step']))
{
    include_once "views/viewing_cart.php";
}
else
{
    // Création d'un tableau des erreurs
    $erreurs_inscription = array();

// Validation des champs suivant les règles en utilisant les données du tableau $_POST
    if (isset($_POST['company_name']))
    {

        $order = new Order(
            array(
                "company_name"=>$_POST['company_name'],
                "address"=>$_POST['address'],
                "country"=>$_POST['country'],
                "tel"=>$_POST['tel'],
                "fax"=>$_POST['fax'],
                "email"=>$_POST['email'],
                "registration_number"=>$_POST['registration_number'],
                "shipping_address"=>$_POST['shipping_address'],
                "contact_name"=>$_POST['contact_name'],
                "note"=>$_POST['note']
            )
        );




        // Si d'autres erreurs ne sont pas survenues
        if (empty($erreurs_inscription) && !isset($erreurs) && $order->isValid())
        {




            // Adding the order into the database

            $manager_order->add($order);


            // Sending an email
            $message_mail = '<html><head></head><body>
            <p>An order has just been submitted to yafabhi.com database</p>
            </body></html>';
            $headers_mail = 'MIME-Version: 1.0' ."\r\n";
            $headers_mail .= 'Content-type: text/html; charset=utf-8' ."\r\n";
            $headers_mail .= 'From: "Yafabhi Company" <admin@yafabhi.com>' ."\r\n";

            mail('patrickbassoukissa@yahoo.fr', 'Order from yafabhi.com', $message_mail, $headers_mail);

            include_once 'views/order_confirmation.php';


        }
        else
        {
            // Displaying again the order form
            $erreurs = $order->erreurs();
            include 'views/checkout_form_view.php';
        }
    }
    else
    {
        // Displaying again the order form
        include 'views/checkout_form_view.php';
    }
}
