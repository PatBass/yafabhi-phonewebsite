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
        <div class="col-sm-3" style="height: 55px; color: #ffffff;"><a href="?module=cart&amp;action=distributor_login" style="color: #ffffff;" class="btn btn-primary" title="Distributor Login">Log In</a></div>
    </div>
    <div class="row">

        <div class="col-sm-12" style="height: 55px; color: #ffffff;"><p><i class="glyphicon glyphicon-shopping-cart"></i> Cart Total: $<?php $sum_total=$cart_management->totalAmount(); if(isset($sum_total)) {echo $sum_total;}else {echo "0";} ?> USD</p></div>
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
            <a class="buyButton" href="index.php?module=cart&amp;action=cart_processing&amp;cmd=emptyCard">Empty the Cart</a>
        </div>
        <div class="col-md-4">
            <a class="buyButton" href="index.php#products_list">
                <!--<img id="shopping_image" src="./images/cart_pic2.png" width="20%" height="100%"/>-->
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <!--<span id="#shopping_button">-->Shopping<!--</span>-->
            </a>
        </div>
        <div class="col-md-4">
            <a class="classname" href="?module=cart&amp;action=cart_processing&amp;step=checkout">Checkout >></a>
        </div>
        <div class="col-md-12"><br></div>
        <form method="post" action="?module=cart&amp;action=cart_processing">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                <tr>
                    <th style="vertical-align:middle;text-align: center; color: white;">Product</th>
                    <th style="vertical-align:middle;text-align: center; color: white;">Price</th>
                    <th style="vertical-align:middle;text-align: center; color: white;">Quantity</th>

                    <th style="vertical-align:middle;text-align: center; color: white;">Action</th>
                </tr>
                </thead>



                <?php
                if ($cart_management->creatingCart())
                {
                    $nbArticles=count($_SESSION['cart_array']['title']);
                    if ($nbArticles <= 0)
                        echo "<tr><td colspan=\"4\"><font color='red'>Your cart is empty!</font> </td></tr>";
                    else
                    {
                        for ($i=0 ;$i < $nbArticles ; $i++)
                        {
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td style='vertical-align:middle;text-align: left;padding-left:5px;'><img src='". $_SESSION['cart_array']['image'][$i]. "' width='12%' height='30%' /> ".htmlspecialchars($_SESSION['cart_array']['title'][$i])."</ td>";
                            echo "<td>$".htmlspecialchars($_SESSION['cart_array']['price'][$i])." USD</td>";
                            echo "<td><input class=\"form-control\" type=\"number\" size=\"6\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['cart_array']['quantity'][$i])."\"/></td>";

                            echo "<td><a href=\"".htmlspecialchars("?module=cart&action=cart_processing&op=suppression&l=".rawurlencode($_SESSION['cart_array']['title'][$i]))."\">Delete Product</a></td>";
                            echo "</tr>";
                            echo "</tbody>";
                        }

                        echo "<tr><td colspan=\"2\"> </td>";
                        echo "<td colspan=\"2\">";
                        echo "<font color='green'>Total : $".$cart_management->totalAmount()." USD</font>";
                        echo "</td></tr>";

                        echo "<tr><td colspan=\"4\">";
                        echo "<button class=\"btn btn-default\" type=\"submit\" title='Enter a quantity value and click here' data-toggle='popover' data-content='Your cart has been updated!' id=\"update_cart\"><i class=\"glyphicon glyphicon-ok-sign\" style=\"color:#4F4;\"></i> Update Cart</button>";
                        echo "<input type=\"hidden\" name=\"op\" value=\"refresh\"/>";

                        echo "</td></tr>";
                    }
                }
                ?>
            </table>
        </form>
    </aside>

</section>