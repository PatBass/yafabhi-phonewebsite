<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 8/26/14
 * Time: 1:01 AM
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
        <div class="col-sm-3" style="height: 55px; color: #ffffff;"><a href="?module=cart&amp;action=distributor_login" style="color: #ffffff;" class="btn btn-primary" title="Distributor Login">Login</a></div>
    </div>
    <div class="row">

        <div class="col-sm-12" style="height: 55px; color: #ffffff;"><p class="cart_pic">Cart Total: <?php echo $cart_management->totalAmount(); ?></p></div>
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
            <a class="buyButton" href="index.php#products_list"><img id="shopping_image" src="./images/cart_pic2.png" width="20%" height="100%"/><span id="#shopping_button">Shopping</span> </a>
        </div>
        <div class="col-md-4">
            <a class="classname" href="?module=cart&amp;action=checkout">Checkout >></a>
        </div>
        <div class="col-md-12"><br></div>

        <form method="post" action="?module=cart&amp;action=cart_managing.php">
        <table  class="table table-bordered table-striped table-condensed">

            <thead>
            <tr>
                <th style="vertical-align:middle;text-align: center; color: white;">Title</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Quantity</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Price</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Action</th>

            </tr>
            </thead>



            <?php
            if ($cart_management->creatingCart())
            {
                $productsNb=count($_SESSION['cart_array']['title']);
                if ($productsNb <= 0)
                    echo "<tr><td colspan='4' style='color: red;'>Your cart is empty! </td></tr>";
                else
                {
                    for ($i=0 ;$i < $productsNb ; $i++)
                    {
                        echo "<tr>";
                        echo "<td>".htmlspecialchars($_SESSION['cart_array']['title'][$i])."</ td>";
                        echo "<td><input type=\"number\" size=\"6\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['cart_array']['quantity'][$i])."\"/></td>";
                        echo "<td>".htmlspecialchars($_SESSION['cart_array']['price'][$i])."</td>";
                        echo "<td><a href=\"".htmlspecialchars("?op=delete&l=".rawurlencode($_SESSION['cart_array']['title'][$i]))."\">XX</a></td>";
                        echo "</tr>";
                    }

                    echo "<tr><td colspan=\"2\"> </td>";
                    echo "<td colspan=\"2\">";
                    echo "Total : ".$cart_management->totalAmount();
                    echo "</td></tr>";

                    echo "<tr><td colspan=\"4\">";
                    echo "<input type='submit' value=\"Refresh\"/>";
                    echo "<input type='hidden' name=\"op\" value=\"refresh\"/>";

                    echo "</td></tr>";
                }
            }
            ?>
        </table>
        </form>
    </aside>

</section>