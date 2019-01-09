<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 8/22/14
 * Time: 7:43 PM
 */

class Order
{
    protected $erreurs = array(),
        $id,
        $company_name,
        $address,
        $tel,
        $fax,
        $registration_number,
        $email,
        $pwd,
        $note,
        $shipping_address,
        $contact_name,
        $country,
        $order_amount,
        $cart_detail,
        $dateAdded;

    const INVALID_COMPANY_NAME = 1;
    const INVALID_ADDRESS = 2;
    const INVALID_TEL = 3;
    const INVALID_FAX = 4;
    const INVALID_REGISTRATION_NUMBER = 5;
    const INVALID_EMAIL = 2;
    const INVALID_COUNTRY = 3;
    const INVALID_CONTACT_NAME = 4;
    const INVALID_NOTE = 5;
    const INVALID_SHIPPING_ADDRESS = 6;
    const INVALID_ORDER_AMOUNT = 7;
    const INVALID_CART_DETAIL = 8;
    const INVALID_PWD = 9;

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

    public function isNew()
    {
        return empty($this->id);
    }

    public function isValid()
    {
        return !(empty($this->company_name)|| empty($this->tel)|| empty($this->email)|| empty($this->country)|| empty($this->contact_name) || empty($this->order_amount)||empty($this->pwd));
    }

    //SETTERS
    public function setId($id)
    {
        $id = (int)$id;
        if($id>0){
            $this->id = $id;
        }
    }

    public function setCompany_name($company_name)
    {
        if(!is_string($company_name)|| empty($company_name) || strlen($company_name)>300)
        {
            $this->erreurs[]= self::INVALID_COMPANY_NAME;
        }
        else
        {
            $this->company_name=$company_name;
        }
    }

    public function setAddress($address)
    {
        if(!is_string($address)|| strlen($address)>300)
            $this->erreurs[]=self::INVALID_ADDRESS;
        else
            $this->address=$address;
    }

    public function setTel($tel)
    {
        if(!is_string($tel)|| strlen($tel)>30 || empty($tel))
            $this->erreurs[]=self::INVALID_TEL;
        else
            $this->tel=$tel;
    }

    public function setFax($fax)
    {
        if(!is_string($fax)|| strlen($fax)>30)
            $this->erreurs[]=self::INVALID_FAX;
        else
            $this->fax=$fax;
    }

    public function setRegistration_number($registration_number)
    {
        if(!is_string($registration_number)|| strlen($registration_number)>30)
            $this->erreurs[]=self::INVALID_REGISTRATION_NUMBER;
        else
            $this->registration_number=$registration_number;
    }

    public function setEmail($email)
    {
        if (is_string($email) && preg_match('/^[A-Z0-9._-]+@[A-Z0-9.-]{2,}\.[A-Z.]{2,6}$/i', $email) && !empty($email))
        {
            $this->email = $email;
        }
        else
        {
            $this->erreurs[]=self::INVALID_EMAIL;
        }
    }

    public function setPwd($pwd)
    {
        if(empty($pwd) || !is_string($pwd))
            $this->erreurs[]=self::INVALID_PWD;
        else
            $this->pwd = $pwd;           
    }

    public function setNote($note)
    {
        if(!is_string($note)|| strlen($note)>300)
            $this->erreurs[]=self::INVALID_NOTE;
        else
            $this->note=$note;
    }

    public function setContact_name($contact_name)
    {
        if(!is_string($contact_name)|| strlen($contact_name)>30 || empty($contact_name))
            $this->erreurs[]=self::INVALID_CONTACT_NAME;
        else
            $this->contact_name=$contact_name;
    }

    public function setShipping_address($shipping_address)
    {
        if(!is_string($shipping_address)|| strlen($shipping_address)>300)
            $this->erreurs[]=self::INVALID_SHIPPING_ADDRESS;
        else
            $this->shipping_address=$shipping_address;
    }

    public function setCountry($country)
    {
        if(!is_string($country)|| empty($country) || strlen($country)<2)
        {
            $this->erreurs[]= self::INVALID_COUNTRY;
        }
        else
        {
            $this->country=$country;
        }
    }


    public function setDateAdded($dateAdded)
    {
        if(is_string($dateAdded) && preg_match('#[a-zA-Z], [0-9]{4} [0-9]{2}:[0-9]{2}#i',$dateAdded))
            $this->dateAdded=$dateAdded;
    }

    public function setOrder_amount($order_amount)
    {
        if(!is_int($order_amount)|| $order_amount <1200)
            $this->erreurs[]=self::INVALID_ORDER_AMOUNT;
        else
            $this->order_amount=$order_amount;
    }

    public function setCart_detail($cart_detail)
    {

            $this->cart_detail=$cart_detail;
    }



    //GETTERS

    public function erreurs()
    {
        return $this->erreurs;
    }

    public function id()
    {
        return $this->id;
    }

    public function company_name()
    {
        return $this->company_name;
    }

    public function address()
    {
        return $this->address;
    }

    public function tel()
    {
        return $this->tel;
    }

    public function fax()
    {
        return $this->fax;
    }

    public function registration_number()
    {
        return $this->registration_number;
    }

    public function email()
    {
        return $this->email;
    }

    public function pwd()
    {
        return $this->pwd;
    }

    public function note()
    {
        return $this->note;
    }

    public function shipping_address()
    {
        return $this->shipping_address;
    }

    public function country()
    {
        return $this->country;
    }

    public function contact_name()
    {
        return $this->contact_name;
    }

    public function dateAdded()
    {
        return $this->dateAdded;
    }

    public function order_amount()
    {
        return $this->order_amount();
    }

    public function cart_detail()
    {
        return $this->cart_detail();
    }

}