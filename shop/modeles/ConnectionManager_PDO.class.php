<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/29/13
 * Time: 3:15 AM
 */

class ConnectionManager_PDO
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db=$db;
    }

    public function combinaison_connexion_valide(Connection $connection)
    {
        $requete = $this->db->prepare("SELECT id_admin FROM admin WHERE user=:user AND pwd=:pwd");
        $requete->bindValue(':user', $connection->user());
        $requete->bindValue(':pwd', $connection->pwd());
        $requete->execute();

        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Connection');


        if($objet = $requete->fetch())
        {
           $requete->closeCursor();
            return $objet->id_admin();

        }

        return false;
    }

    public function lire_infos_utilisateur($id)
    {
        $requete = $this->db->prepare("SELECT id_admin, user, pwd FROM admin WHERE id_admin=:id_admin");
        $requete->bindValue(':id_admin', $id, PDO::PARAM_INT);

        $requete->execute();

        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Connection');


        if($objet = $requete->fetch())
        {
            $requete->closeCursor();
            return $objet;

        }

        return false;
    }


} 