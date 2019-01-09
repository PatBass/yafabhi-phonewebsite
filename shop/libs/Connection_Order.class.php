<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 9/21/14
 * Time: 12:12 AM
 */
class Connexion_Order
{
    protected   $id_order,
        $email,
        $mdp,
        $erreurs=array();

    const EMAIL_INVALIDE = 1;
    const MDP_INVALIDE = 2;

    public function __construct($valeurs=array())
    {
        if(!empty($valeurs))
            $this->hydrate($valeurs);
    }

    public function hydrate($donnees)
    {
        foreach($donnees as $attribut => $valeur)
        {
            $methode = 'set'.ucfirst($attribut);

            if(is_callable(array($this, $methode)))
            {
                $this->$methode($valeur);
            }
        }
    }

    public function isValid()
    {
        return !(empty($this->email) || empty($this->mdp));
    }

    //SETTERS

    public function setId($id)
    {
        $this->id= (int)$id;
    }

    public function setEmail($email)
    {
        if(!empty($email) && is_string($email))
            $this->email = $email;
        else
            $this->erreurs[]=self::EMAIL_INVALIDE;
    }

    public function setMdp($mdp)
    {
        if(!empty($mdp))
            $this->mdp = $mdp;
        else
            $this->erreurs[]=self::MDP_INVALIDE;
    }

    //GETTERS

    public function id()
    {
        return $this->id;
    }

    public function erreurs()
    {
        return $this->erreurs;
    }

    public function email()
    {
        return $this->email;
    }

    public function mdp()
    {
        return $this->mdp;
    }


}