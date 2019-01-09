<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 4/25/14
 * Time: 12:59 PM
 */


if (isset ($_POST['first_name']))
{


    $contact = new Contact(
        array (
            'last_name' => $_POST['last_name'],
            'first_name' => $_POST['first_name'],
            'email' => $_POST['email'],
            'message' => $_POST['message']
        )
    );

    if (isset($_POST['id']))
        $contact->setId($_POST['id']);

    if (!isset($erreurs) && $contact->isValid())
    {

        $manager_contact->save($contact);





        // Sending an email
        $message_mail = '<html><head></head><body>
            <p>A message has just been submitted from Yafabhi.com contact page</p>
            </body></html>';
        $headers_mail = 'MIME-Version: 1.0' ."\r\n";
        $headers_mail .= 'Content-type: text/html; charset=utf-8' ."\r\n";
        $headers_mail .= 'From: "Yafabhi Company" <admin@yafabhi.com>' ."\r\n";

        mail('angechange@gmail.com', 'A Customer Submitted a Message Via yafabhi.com', $message_mail, $headers_mail);

        include 'http://yafabhi.com/modules/contact/views/message_sent.php' ;
    }
    else
    {
        $erreurs = $contact->erreurs();
        if(empty($_GET['lang']))
        {
            include_once 'http://yafabhi.com/modules/contact/views/contact_view.php';
        }
        else
        {
            include 'http://yafabhi.com/modules/contact/views/contact_view.php';
        }
    }
}
else
{
    if(empty($_GET['lang']))
    {
        include_once 'http://yafabhi.com/modules/contact/views/contact_view.php';
    }
    else
    {
        include 'http://yafabhi.com/modules/contact/views/contact_view.php';
    }
}



