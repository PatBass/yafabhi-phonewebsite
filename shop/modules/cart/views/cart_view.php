<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 7/1/14
 * Time: 3:59 PM
 */
$running_page="cart";
?>
<section class="starter-template starter-template-modified">
    <div class="row">
        <div class="col-sm-12" style="height: 50px;"></div>
    </div>
    <div class="row">
        <div class="col-sm-4" style="height: 55px;"><img src="../images/logoOLD.png"></div>
        <div class="col-sm-5" style="height: 55px;"></div>
        <div class="col-sm-3" style="height: 55px; color: #ffffff;"><span id="wss">Login / Register</span></div>
    </div>
    <div class="row">

        <div class="col-sm-12" style="height: 55px; color: #ffffff;"><p><i class="glyphicon glyphicon-shopping-cart"></i> Cart Total: <?php echo $cart_management->totalAmount(); ?></p></div>
    </div>

    <div class="row">
        <div class="col-sm-12">

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="height: 50px; color: #ffffff;"></div>
    </div>
    <div class="row">



    </div>
    <div class="row">
        <div class="col-sm-12" style="height: 50px; color: #ffffff;"></div>
    </div>

    <aside class="row" style="rgba(255,255,255,0.3); text-align: center;">
        <div class="col-md-4">
            <a class="buyButton" href="index.php?module=cart&amp;action=cart_show&amp;cmd=emptyCard">Empty the Cart</a>
        </div>
        <div class="col-md-4">
            <a class="buyButton" href="index.php#products_list">
                <!--<img id="shopping_image" src="./images/cart_pic2.png" width="20%" height="100%"/>-->
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <!--<span id="#shopping_button">-->Shopping<!--</span>-->
            </a>
        </div>
        <div class="col-md-4">
            <a class="classname" href="?module=cart&amp;action=checkout">Checkout >></a>
        </div>
        <div class="col-md-12"><br></div>
        <table class="table table-bordered table-striped table-condensed">
            <thead>
            <tr>
                <th style="vertical-align:middle;text-align: center; color: white;">Product</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Price</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Quantity</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Total</th>

            </tr>
            </thead>
            <?php

            if(!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1)
            {

                echo'

                            <tbody>
                                <tr>
                                    <td style="vertical-align:middle;"></td>
                                    <td style="vertical-align:middle;"></td>
                                    <td style="vertical-align:middle;">Your shopping cart is empty!</td>
                                    <td></td>

                                </tr>
                            </tbody>'. "\n";

            }
            else
            {
                $i=0;
                foreach($_SESSION['cart_array'] as $each_item)
                {
                    $total_amount=0;
                    $i++;

                    $item_sum = $each_item["quantity"]*$each_item["price"];
                    $total_amount=$total_amount+$item_sum;
                    if(isset($_POST['quantity']))
                    {
                        $subtotal=$_POST['quantity']*$each_item['price'];
                    }
                    //while(list($key,$value)=each($each_item))
                    //{

                    echo'

                            <tbody>
                                <tr>
                                    <td style="vertical-align:middle;"><img src="'. $each_item['picture']. '" width="12%" height="30%" /></td>
                                    <td style="vertical-align:middle;">'.'$'. $each_item['price'].' USD</td>
                                    <td style="vertical-align:middle;">
                                        <form method="post" action="?module=cart&amp;action=cart_show">
                                        <input name="pictureOutput" type="hidden" value="';?><?php echo $each_item['picture']; ?><?php echo '" />
                                        <input name="quantity" type="number" value="';?><?php if(isset($_POST['pictureOutput'])){echo $cart_management->outputQuantity($_POST['pictureOutput']);}?><?php echo '" /><input type="submit" value="Update" />'.$each_item['quantity'].'
                                        </form>
                                    </td>
                                    <td style="vertical-align:middle;">'; ?><?php if(!isset($_POST['quantity'])){ echo $item_sum;}else{echo $subtotal;}?><?php echo' USD</td>

                                </tr>
                            </tbody>'. "\n";


                    //}


                }
            }


            ?>
        </table>
        <p style="color:white;"><?php echo $cart_management->totalAmount(); ?></p>

    </aside>

</section>