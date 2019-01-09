<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 8/25/14
 * Time: 10:52 PM
 */
class CartManagement
{
    function creatingCart()
    {
        if (!isset($_SESSION['cart_array'])){
            $_SESSION['cart_array']=array();
            $_SESSION['cart_array']['title'] = array();
            $_SESSION['cart_array']['quantity'] = array();
            $_SESSION['cart_array']['price'] = array();
            $_SESSION['cart_array']['image'] = array();
            $_SESSION['cart_array']['locked'] = false;
        }
        return true;
    }

    function addProduct($title,$quantity,$price, $image)
    {

        //If cart doesn't exist
        if ($this->creatingCart() && !($this->isLocked()))
        {
            //If product already exists, then we only assign its quantity
            $productIndex = array_search($title,  $_SESSION['cart_array']['title']);

            if ($productIndex !== false)
            {
                $_SESSION['cart_array']['quantity'][$productIndex] += $quantity ;
            }
            else
            {
                //Otherwise, we add the product
                array_push( $_SESSION['cart_array']['title'],$title);
                array_push( $_SESSION['cart_array']['quantity'],$quantity);
                array_push( $_SESSION['cart_array']['price'],$price);
                array_push( $_SESSION['cart_array']['image'],$image);
            }
        }
        else
            echo "An issue occurred, please seek advice to your webmaster.";
    }


    function deleteProduct($title){
        //Si le panier existe
        if ($this->creatingCart() && !$this->isLocked())
        {
            //Nous allons passer par un panier temporaire
            $tmp=array();
            $tmp['title'] = array();
            $tmp['quantity'] = array();
            $tmp['price'] = array();
            $tmp['image'] = array();
            $tmp['locked'] = $_SESSION['cart_array']['locked'];

            for($i = 0; $i < count($_SESSION['cart_array']['title']); $i++)
            {
                if ($_SESSION['cart_array']['title'][$i] !== $title)
                {
                    array_push( $tmp['title'],$_SESSION['cart_array']['title'][$i]);
                    array_push( $tmp['quantity'],$_SESSION['cart_array']['quantity'][$i]);
                    array_push( $tmp['price'],$_SESSION['cart_array']['price'][$i]);
                    array_push( $tmp['image'],$_SESSION['cart_array']['image'][$i]);
                }

            }
            //On remplace le panier en session par notre panier temporaire à jour
            $_SESSION['cart_array'] =  $tmp;
            //On efface notre panier temporaire
            unset($tmp);
        }
        else
            echo "An issue occurred. Please contact the webmaster";
    }

    function updateProductQuantity($title,$quantity)
    {
        //Si le panier éxiste
        if ($this->creatingCart() && !$this->isLocked())
        {
            //Si la quantité est positive on modifie sinon on supprime l'article
            if ($quantity > 0)
            {
                //Recharche du produit dans le panier
                $productIndex = array_search($title,  $_SESSION['cart_array']['title']);

                if ($productIndex !== false)
                {
                    $_SESSION['cart_array']['quantity'][$productIndex] = $quantity ;
                }
            }
            else
                $this->deleteProduct($title);
        }
        else
            echo "An issue occurred. Please contact the webmaster.";
    }

    function totalAmount()
    {
        if(isset($_SESSION['cart_array']))
        {
            $total=0;
            for($i = 0; $i < count($_SESSION['cart_array']['title']); $i++)
            {
                $total += $_SESSION['cart_array']['quantity'][$i] * $_SESSION['cart_array']['price'][$i];
            }
            return $total;
        }

    }

    function isLocked(){
        if (isset($_SESSION['cart_array']) && $_SESSION['cart_array']['locked'])
            return true;
        else
            return false;
    }

    function countProducts()
    {
        if (isset($_SESSION['cart_array']))
            return count($_SESSION['cart_array']['title']);
        else
            return 0;

    }

    function deleteCart(){
        unset($_SESSION['cart_array']);
    }
}
