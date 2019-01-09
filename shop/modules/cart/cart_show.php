<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 7/1/14
 * Time: 3:58 PM
 */

if(isset($_GET['cmd']) && $_GET['cmd']=="emptyCard")
{
    unset($_SESSION['cart_array']);
}



if(isset($_GET['id']))
{
    $cartProduct = $manager_product->getUnique($_GET['id']);
    $price = $cartProduct->price();
    list($price,$picture )=array($price, $cartProduct->image());
    $pid = $_GET['id'];
    $wasFound = false;
    $i=0;
    if(!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1)
    {
        $cartOutputMessage = "<p style='color: #f00;background-color: white;'>Your shopping cart is empty</p>";
        $_SESSION['cart_array'] = array(0=>array("item_id"=>$pid, "quantity"=>1, "price"=>$price, "picture"=>$picture));
    }
    else
    {
        foreach($_SESSION['cart_array'] as $each_item)
        {
            $i++;
            while(list($key,$value)=each($each_item))
            {
                if($key=="item_id" && $value==$pid)
                {
                    array_splice($_SESSION['cart_array'], $i-1, 1, array(array("item_id"=>$pid, "quantity"=>$each_item['quantity']+1, "price"=>$price, "picture"=>$picture)));
                    $wasFound=true;
                }
            }

        }
        if($wasFound==false)
        {
            array_push($_SESSION['cart_array'], array("item_id"=>$pid, "quantity"=>1, "price"=>$price, "picture"=>$picture));

        }

    }
    header("Location: index.php?module=cart&action=cart_show");
}
/*
if(isset($_POST['quantity']))
{
    $cart_management->UpdateProductQuantity($cartProduct->title(), $_POST['quantity']);
}
*/
include_once "views/cart_view.php";
