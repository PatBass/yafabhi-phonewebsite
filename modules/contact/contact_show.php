<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 4/25/14
 * Time: 12:59 PM
 */

if(isset($_GET['supprimer']))
{
    $manager_contact->delete((int)$_GET['supprimer']);
    include_once 'views/message_removed.php';

}


if (isset ($_POST['first_name']))
{


    $contact = new Contact(
        array (
            'last_name' => strip_tags($_POST['last_name']),
            'first_name' => strip_tags($_POST['first_name']),
            'email' => strip_tags($_POST['email']),
            'message' => strip_tags($_POST['message'])
        )
    );

    if (isset($_POST['id']))
        $contact->setId($_POST['id']);

    if (!isset($erreurs) && $contact->isValid())
    {

        $manager_contact->save($contact);


        // Create the email and send the message
        $to = 'Andema@yafabhi.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
        $email_subject = "Yafabhi Contact Form: ".$contact->first_name()." ".$contact->last_name();
        $email_body = "You have received a new message from Yafabhi contact form.\n\n"."Here are the details:\n\nName: ". $contact->first_name()." ".$contact->last_name()."\n\nEmail: ".$contact->email()."\n\nMessage: \n".$contact->message();
        $headers = "From: noreply@yafabhi.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: ".$contact->email();
        mail($to,$email_subject,$email_body,$headers);
        include 'views/message_sent.php' ;
        return true;


        // Sending an email
        /*$message_mail = '<html><head></head><body>
            <p>A message has just been submitted from Yafabhi.com contact page</p>
            </body></html>';
        $headers_mail = 'MIME-Version: 1.0' ."\r\n";
        $headers_mail .= 'Content-type: text/html; charset=utf-8' ."\r\n";
        $headers_mail .= 'From: "Yafabhi Company" <admin@yafabhi.com>' ."\r\n";

        mail('angechange@gmail.com', 'A Customer Submitted a Message Via yafabhi.com', $message_mail, $headers_mail);*/


    }
    else
    {
        $erreurs = $contact->erreurs();
        if(empty($_GET['lang']))
        {
            include_once 'views/contact_view.php';
        }
        else
        {
            include 'views/contact_form.php';
        }
    }
}
else
{
    if(empty($_GET['lang']))
    {
        include_once 'views/contact_view.php';
    }
    else
    {
        include 'views/contact_form.php';
    }
}



