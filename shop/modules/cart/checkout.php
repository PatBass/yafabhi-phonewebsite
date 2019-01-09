<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 8/21/14
 * Time: 10:47 PM
 */


// Creating an errors array
$order_errors = array();

// Validating fields using $_POST variable
if (isset($_POST['company_name']))
{

    $order = new Order(
        array(
            "company_name"=>strip_tags($_POST['company_name']),
            "address"=>strip_tags($_POST['address']),
            "country"=>$_POST['country'],
            "tel"=>strip_tags($_POST['tel']),
            "fax"=>strip_tags($_POST['fax']),
            "email"=>strip_tags($_POST['email']),
            "pwd"=>strip_tags($_POST['pwd']),
            "pwd_verify"=>strip_tags($_POST['pwd_verify']),
            "registration_number"=>strip_tags($_POST['registration_number']),
            "shipping_address"=>strip_tags($_POST['shipping_address']),
            "contact_name"=>strip_tags($_POST['contact_name']),
            "note"=>strip_tags($_POST['note'])
        )
    );


    if ($_POST['pwd'] != $_POST['pwd_verify'])
    {
        $order_errors[] = "Both the password and password confirmation values must be identical!";
    }
    else
    {
        $pwd = sha1($_POST['pwd']);
        $order->setPwd($pwd);
    }

    // Si d'autres erreurs ne sont pas survenues
    if (empty($order_errors) && !isset($erreurs) && $order->isValid())
    {




        // Adding the order into the database

        $id_order=$manager_order->add($order);

        $id_order = (int) $id_order;

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