<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 7/1/14
 * Time: 4:56 PM
 */
class Product
{
    protected $erreurs = array(),
        $id,
        $title,
        $price,
        $category,
        $description,
        $image,
        $dateAdded,
        $dateUpdated;

    const PRICE_INVALIDE = 1;
    const TITLE_INVALIDE = 2;
    const DESCRIPTION_INVALIDE = 3;
    const CATEGORY_INVALIDE = 4;
    const IMAGE_INVALIDE = 5;

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
        return !(empty($this->title)|| empty($this->price)|| empty($this->description)|| empty($this->category));
    }

    //SETTERS
    public function setId($id)
    {
        $id = (int)$id;
        if($id>0){
            $this->id = $id;
        }
    }

    public function setPrice($price)
    {
        if(!is_string($price)|| empty($price))
        {
            $this->erreurs[]= self::PRICE_INVALIDE;
        }
        else
        {
            $this->price=$price;
        }
    }

    public function setTitle($title)
    {
        if(!is_string($title)|| empty($title))
            $this->erreurs[]=self::TITLE_INVALIDE;
        else
            $this->title=$title;
    }

    public function setDescription($description)
    {
        if(!is_string($description)|| empty($description))
            $this->erreurs[]=self::DESCRIPTION_INVALIDE;
        else
            $this->description=$description;
    }

    public function setCategory($category)
    {
        if(!is_string($category)|| empty($category))
        {
            $this->erreurs[]= self::CATEGORY_INVALIDE;
        }
        else
        {
            $this->category=$category;
        }
    }

    public function setImage($image)
    {

        $this->image=$image;
    }

    public function setDateAdded($dateAdded)
    {
        if(is_string($dateAdded) && preg_match('#[a-zA-Z], [0-9]{4} [0-9]{2}:[0-9]{2}#i',$dateAdded))
            $this->dateAdded=$dateAdded;
    }

    public function setDateUpdated($dateUpdated)
    {
        if(is_string($dateUpdated) && preg_match('#[a-zA-Z], [0-9]{4} [0-9]{2}:[0-9]{2}#i',$dateUpdated))
            $this->dateUpdated=$dateUpdated;
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

    public function price()
    {
        return $this->price;
    }

    public function title()
    {
        return $this->title;
    }

    public function description()
    {
        return $this->description;
    }

    public function image()
    {
        return $this->image;
    }

    public function category()
    {
        return $this->category;
    }

    public function dateAdded()
    {
        return $this->dateAdded;
    }

    public function dateUpdated()
    {
        return $this->dateUpdated;
    }
}