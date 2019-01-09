<?php
$running_page="shop";
?>
<section class="row" >

    <div class="col-md-8 col-md-offset-2" style="margin-top: 50px; margin-bottom: 50px; border:2px solid white; background-color:#f5f5f5 ; border-radius: 5px;">
        <h3 class="titre_page">Log In Confirmation</h3>
        <br>
        <br>
        <p>Welcome, <strong><?php echo $_SESSION['user']; ?></strong>.<br />
            <font color="green">Tracking Area</font> </p>
        <br>

        <a class="btn btn-primary" href="index.php?module=admin_products&action=admin_products_show">Click here to track your items</a>
        <br><br>
    </div>
    <div class="col-md-offset-2"></div>

</section>
