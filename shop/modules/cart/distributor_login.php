<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 9/19/14
 * Time: 8:58 PM
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
            include 'views/distributor_login_view.php';
        }
    }
    else
    {
        $erreurs = $connection->erreurs();
        include 'views/distributor_login_view.php';
    }

}
else
{
    include 'views/distributor_login_view.php';
}


