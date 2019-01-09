<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 7/1/14
 * Time: 5:15 PM
 */


if(isset($_GET['log_out']))
{
    session_destroy();
    header("Location: http://localhost/yafabhi2/shop/index.php?module=admin_products&action=login_in");

}


if(isset($_GET['modifier']))
{
    $product = $manager_product->getUnique((int)$_GET['modifier']);

    if (!empty($_FILES['image']))
    {

        if($_FILES['image']['error'] == 0)
        {


            $infosfichier = pathinfo($_FILES['image']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'png', 'gif');


            if (in_array($extension_upload, $extensions_autorisees))
            {
                //redimensionner
                $image_filename = './images_uploads/'.$product->id().'.'.strtolower($extension_upload);
                move_uploaded_file($_FILES['image']['tmp_name'], $image_filename);

                $image = new Image($image_filename);
                $image->resize_to(190, 240);

                $image_filename = './images_uploads/'.$product->id().'.'.strtolower(pathinfo($image->get_filename(),PATHINFO_EXTENSION));
                $imageObj=$image->save_as($image_filename);

                $product->setImage($imageObj->get_filename());
                $id_product = $product->id();
                $manager_product->maj_image_product($id_product , $imageObj->get_filename());

                /*if(move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_filename))
                {

                    $membre->setAvatar($avatar->get_filename());
                }
                else
                {
                    $erreurs_inscription[]="Erreur de transfert de fichier vers sa destination finale";
                }*/

            }
            else
            {
                $erreurs_inscription[]="Seules les images en .jpeg, .jpg, .png et .gif sont autorisées";
            }

        }
        /*else
        {
            if ($_FILES['avatar']['error']==UPLOAD_ERR_NO_FILE)
            {
                $erreurs_inscription[]="Erreur lors de l'envoi du cv : fichier manquant";
            }
            elseif ($_FILES['avatar']['error']==UPLOAD_ERR_INI_SIZE)
            {
                $erreurs_inscription[]="Erreur lors de l'envoi du cv : le fichier dépasse la taille maximale autorisée par PHP.";
            }
            elseif ($_FILES['avatar']['error']==UPLOAD_ERR_FORM_SIZE)
            {
                $erreurs_inscription[]="Erreur lors de l'envoi du cv : le fichier dépasse la taille maximale autorisée par le formulaire.";
            }
            elseif ($_FILES['avatar']['error']==UPLOAD_ERR_PARTIAL)
            {
                $erreurs_inscription[]="Erreur lors de l'envoi du cv : fichier transféré partiellement.";
            }
        }*/
        //$avatarObj->get_filename

    }

}


if(isset($_GET['supprimer']))
{
    $manager_product->delete((int)$_GET['supprimer']);
    $message = "The product has been removed successfully!";

}

if(admin_connecte())
{
    if(isset($_POST['title']))
    {
        $product = new Product(
            array(
                'price'=>$_POST['price'],
                'title'=>$_POST['title'],
                'description'=>$_POST['description'],
                'category'=>$_POST['category']
            )
        );

        if(isset($_POST['id']))
            $product->setId((int)$_POST['id']);

        $autres_erreurs = array();

        if(!isset($erreurs) && $product->isValid())
        {
            if(empty($autres_erreurs))
            {
                //$manager->save($news);
                if($product->isNew())
                {
                    $id_product = $manager_product->add($product);

                    if(ctype_digit($id_product))
                    {
                        $id_product = (int)$id_product;


                        if (!empty($_FILES['image']))
                        {

                            if($_FILES['image']['error'] == 0)
                            {


                                $infosfichier = pathinfo($_FILES['image']['name']);
                                $extension_upload = $infosfichier['extension'];
                                $extensions_autorisees = array('jpg', 'jpeg', 'png', 'gif');


                                if (in_array($extension_upload, $extensions_autorisees))
                                {
                                    //redimensionner
                                    $image_filename = 'images_uploads/'.$id_product.'.'.strtolower($extension_upload);
                                    move_uploaded_file($_FILES['image']['tmp_name'], $image_filename);

                                    $image = new Image($image_filename);
                                    $image->resize_to(190, 240);

                                    // previously: .strtolower(pathinfo($image->get_filename(),PATHINFO_EXTENSION));
                                    $imageObj=$image->save_as($image_filename);

                                    $product->setImage($imageObj->get_filename());

                                    $manager_product->maj_image_product($id_product , $imageObj->get_filename());

                                    /*if(move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_filename))
                                    {

                                        $membre->setAvatar($avatar->get_filename());
                                    }
                                    else
                                    {
                                        $erreurs_inscription[]="Erreur de transfert de fichier vers sa destination finale";
                                    }*/

                                }
                                else
                                {
                                    $erreurs_inscription[]=" .jpeg, .jpg, .png or .gif pictures is required";
                                }

                            }
                            /*else
                            {
                                if ($_FILES['avatar']['error']==UPLOAD_ERR_NO_FILE)
                                {
                                    $erreurs_inscription[]="Erreur lors de l'envoi du cv : fichier manquant";
                                }
                                elseif ($_FILES['avatar']['error']==UPLOAD_ERR_INI_SIZE)
                                {
                                    $erreurs_inscription[]="Erreur lors de l'envoi du cv : le fichier dépasse la taille maximale autorisée par PHP.";
                                }
                                elseif ($_FILES['avatar']['error']==UPLOAD_ERR_FORM_SIZE)
                                {
                                    $erreurs_inscription[]="Erreur lors de l'envoi du cv : le fichier dépasse la taille maximale autorisée par le formulaire.";
                                }
                                elseif ($_FILES['avatar']['error']==UPLOAD_ERR_PARTIAL)
                                {
                                    $erreurs_inscription[]="Erreur lors de l'envoi du cv : fichier transféré partiellement.";
                                }
                            }*/
                            //$avatarObj->get_filename

                        }



                        include_once 'views/product_added.php';
                    }
                    else
                    {
                        $erreurs_mysql =& $id_product;

                        if(23000 == $erreurs_mysql[0])// Le code d'erreur 23000 siginife "doublon"dans le standard ANSI SQL
                        {
                            preg_match("`Duplicate entry '(.+)' for key \d+`is", $erreurs_mysql[2], $valeur_probleme);
                            $valeur_probleme = $valeur_probleme[1];
                            if($product->description()== $valeur_probleme)
                            {
                                $autres_erreurs[]="That description is already assigned to a product";
                            }
                        }
                        else
                        {
                            $autres_erreurs[]= sprintf("Erreur ajout SQL : cas non traité (SQLSTATE = %d).", $erreurs_mysql[0]);
                        }
                    }
                }
                else
                {
                    $manager_product->update($product);

                    if (!empty($_FILES['image']))
                    {

                        if($_FILES['image']['error'] == 0)
                        {


                            $infosfichier = pathinfo($_FILES['image']['name']);
                            $extension_upload = $infosfichier['extension'];
                            $extensions_autorisees = array('jpg', 'jpeg', 'png', 'gif');


                            if (in_array($extension_upload, $extensions_autorisees))
                            {
                                //redimensionner
                                $image_filename = './images_uploads/'.$id_product.'.'.strtolower($extension_upload);
                                move_uploaded_file($_FILES['image']['tmp_name'], $image_filename);

                                $image = new Image($image_filename);
                                $image->resize_to(190, 240);

                                $image_filename = './images_uploads/'.$id_product.'.'.strtolower(pathinfo($image->get_filename(),PATHINFO_EXTENSION));
                                $imageObj=$image->save_as($image_filename);

                                $product->setImage($imageObj->get_filename());

                                $manager_product->maj_image_product($id_product , $imageObj->get_filename());

                                /*if(move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_filename))
                                {

                                    $membre->setAvatar($avatar->get_filename());
                                }
                                else
                                {
                                    $erreurs_inscription[]="Erreur de transfert de fichier vers sa destination finale";
                                }*/

                            }
                            else
                            {
                                $erreurs_inscription[]="Seules les images en .jpeg, .jpg, .png et .gif sont autorisées";
                            }

                        }
                        /*else
                        {
                            if ($_FILES['avatar']['error']==UPLOAD_ERR_NO_FILE)
                            {
                                $erreurs_inscription[]="Erreur lors de l'envoi du cv : fichier manquant";
                            }
                            elseif ($_FILES['avatar']['error']==UPLOAD_ERR_INI_SIZE)
                            {
                                $erreurs_inscription[]="Erreur lors de l'envoi du cv : le fichier dépasse la taille maximale autorisée par PHP.";
                            }
                            elseif ($_FILES['avatar']['error']==UPLOAD_ERR_FORM_SIZE)
                            {
                                $erreurs_inscription[]="Erreur lors de l'envoi du cv : le fichier dépasse la taille maximale autorisée par le formulaire.";
                            }
                            elseif ($_FILES['avatar']['error']==UPLOAD_ERR_PARTIAL)
                            {
                                $erreurs_inscription[]="Erreur lors de l'envoi du cv : fichier transféré partiellement.";
                            }
                        }*/
                        //$avatarObj->get_filename

                    }
                    include_once 'views/product_updated.php';
                }
            }
            else
            {
                include_once 'views/admin_products_view.php';
            }
        }
        else
        {
            $erreurs = $product->erreurs();
            include_once 'views/admin_products_view.php';

        }
    }
    else
    {
        include_once 'views/admin_products_view.php';
    }
}
else
{
    header("Location: index.php?module=admin_products&action=login_in");
}



