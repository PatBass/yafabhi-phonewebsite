<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 9/14/14
 * Time: 2:09 PM
 */

class Contact
{
    protected $erreurs = array(),
        $id,
        $last_name,
        $first_name,
        $email,
        $message,
        $dateAjout;

    /**
     * Constantes relatives aux erreurs possibles rencontrées lors de l'exécution de la méthode
     */

    const INVALID_LAST_NAME = 1;
    const INVALID_FIRST_NAME = 2;
    const INVALID_MESSAGE = 3;
    const INVALID_EMAIL = 4;

    /**
     * Constructeur de la classe qui assigne les données spécifiées en paramètre aux attributs correspondants
     * @param $valeurs array Les valeurs à assigner
     * @return void
     */

    public function __construct($valeurs=array())
    {
        if (!empty($valeurs))
        {
            $this->hydrate($valeurs);
        }

    }

    /**
     * Méthode assignant les valeurs spécifiées aux attributs correspondant
     * @param $donnees array Les données à assigner
     * @return void
     */

    public function hydrate($donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
            $methode = 'set'.ucfirst($attribut);

            if (is_callable(array($this, $methode)))
            {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * Méthode permettant de savoir si le contact est nouveau, et ce afin d'éviter un double enregistrement
     * @return bool
     */
    public function isNew()
    {
        return empty($this->id);
    }

    /**
     * Méthode permettant de savoir si le contact est valide
     * @return bool
     */
    public function isValid()
    {
        return !(empty($this->last_name) || empty($this->first_name) || empty($this->message) || empty($this->email));
    }


    // SETTERS //
    public function setId($id)
    {
        $id = (int)$id;

        $this->id = $id;
    }

    public function setLast_name($last_name)
    {
        if (is_string($last_name) && strlen($last_name)<=50 && !empty($last_name))
        {
            $this->last_name = $last_name;
        }
        else
        {
            $this->erreurs[]=self::INVALID_LAST_NAME;
        }
    }

    public function setFirst_name($first_name)
    {
        if (is_string($first_name) && strlen($first_name)<=50 && !empty($first_name))
        {
            $this->first_name = $first_name;
        }
        else
        {
            $this->erreurs[]=self::INVALID_FIRST_NAME;
        }
    }

    public function setMessage($message)
    {
        if (is_string($message) && !empty($message))
        {
            $this->message = $message;
        }
        else
        {
            $this->erreurs[]=self::INVALID_MESSAGE;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email) && preg_match('/^[A-Z0-9._-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z.]{2,6}$/i', $email))
        {
            $this->email = $email;
        }
        else
        {
            $this->erreurs[]=self::INVALID_EMAIL;
        }
    }

    public function setDateAjout($dateAjout)
    {
        if (is_string($dateAjout) && preg_match('`le [0-9]{2}/[0-9]{2}/[0-9]{4} à [0-9]{2}h[0-9]{2}`', $dateAjout))
            $this->dateAjout = $dateAjout;
    }


    //LES GETTERS

    public function erreurs()
    {
        return $this->erreurs;
    }

    public function id()
    {
        return $this->id;
    }

    public function last_name()
    {
        return $this->last_name;
    }

    public function first_name()
    {
        return $this->first_name;
    }

    public function message()
    {
        return $this->message;
    }

    public function dateAjout()
    {
        return $this->dateAjout;
    }

    public function email()
    {
        return $this->email;
    }
} 