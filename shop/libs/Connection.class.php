<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/28/13
 * Time: 3:50 PM
 */

class Connection
{
    protected   $id_admin,
                $user,
              $pwd,
            $erreurs=array();

    const INVALID_USER = 1;
    const INVALID_PWD = 2;

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
        return !(empty($this->user) || empty($this->pwd));
    }

    //SETTERS

    public function setId_admin($id)
    {
        $this->id_admin= (int)$id;
    }

    public function setUser($user)
    {
        if(!empty($user) && is_string($user))
            $this->user = $user;
        else
            $this->erreurs[]=self::INVALID_USER;
    }

    public function setPwd($pwd)
    {
        if(!empty($pwd))
            $this->pwd = $pwd;
        else
            $this->erreurs[]=self::INVALID_PWD;
    }

    //GETTERS

    public function id_admin()
    {
        return $this->id_admin;
    }

    public function erreurs()
    {
        return $this->erreurs;
    }

    public function user()
    {
        return $this->user;
    }

    public function pwd()
    {
        return $this->pwd;
    }


} 