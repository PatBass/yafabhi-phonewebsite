<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 8/19/14
 * Time: 12:28 AM
 */
if(isset($_POST['quantity']))
{
    $item_sum_update = $each_item['price']*$_POST['quantity'];
    include_once 'views/cart_view.php';
}