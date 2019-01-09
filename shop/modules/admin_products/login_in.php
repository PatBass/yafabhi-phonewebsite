<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/28/13
 * Time: 3:20 PM
 */



if(isset($_POST['user']) && isset($_POST['pwd']))
{
    $connection = new Connection(
        array(
        "user"=>$_POST['user'],
        "pwd"=>$_POST['pwd']
    )
    );

    if(!isset($erreurs) && $connection->isValid())
    {
        $id_product = $manager_log->combinaison_connexion_valide($connection);

        // Si les identifiants sont valides
        if (false !== $id_product)
        {
            $connex = $manager_log->lire_infos_utilisateur($id_product);
            // On enregistre les informations dans la session
            $_SESSION['id_admin'] = $id_product;
            $_SESSION['user'] = $connex->user();


            // Affichage de la confirmation de la connexion
            include 'views/login_ok.php';
        }
        else
        {
            $erreurs_connexion[] = "Invalid user and / or password.";
            // On réaffiche le formulaire de connexion
            include 'views/log_in_view.php';
        }
    }
    else
    {
        $erreurs = $connection->erreurs();
        include 'views/log_in_view.php';
    }

}
else
{
    include_once 'views/log_in_view.php';
}