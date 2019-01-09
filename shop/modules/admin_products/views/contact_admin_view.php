<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/19/14
 * Time: 2:09 PM
 */
$running_page="shop";
?>
<section class="starter-template starter-template-modified">
    <div class="row">
        <div class="col-sm-12" style="height: 50px;"></div>
    </div>
    <div class="row">
        <div class="col-sm-4" style="height: 55px;"><img src="../images/logoOLD.png"></div>
        <div class="col-sm-5" style="height: 55px;color:white;"></div>
        <div class="col-sm-3" style="height: 55px; color: #ffffff;"></div>
    </div>

    <aside class="row" style="rgba(255,255,255,0.3); text-align: center;">
        <p style="text-align: center; color: #ffffff;">Currently, there are <?php echo
            htmlspecialchars($manager_product->count()); ?> messages in the database.</p>
        <br>
        <br>
        <table id="show" class="table table-bordered table-striped table-condensed">
            <thead>
            <tr>
                <th style="vertical-align:middle;text-align: center; color: white;">Title</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Price</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Category</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Image</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Description</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Date Added</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Last Update</th>
                <th style="vertical-align:middle;text-align: center; color: white;">Action</th>
            </tr>
            </thead>
            <?php
            foreach ($manager_product->getList() as $product)
                echo '
            <tbody>
                <tr>
                    <td style="vertical-align:middle;">'. htmlspecialchars($product->title()). '</td>
                    <td style="vertical-align:middle;">'. htmlspecialchars($product->price()).'</td>
                    <td style="vertical-align:middle;">'. htmlspecialchars($product->category()).'</td>
                    <td><img class="flottant_gauche" src="images_uploads/'.htmlspecialchars($product->id()).'.'.strtolower(pathinfo($product->image(), PATHINFO_EXTENSION)).'" title="<?php echo htmlspecialchars($product->title()); ?>" /></td>
                    <td style="text-align:left;">'. nl2br(htmlspecialchars($product->description())).'</td>
                    <td style="vertical-align:middle;">'. htmlspecialchars($product->dateAdded()). '</td>
                    <td style="vertical-align:middle;">'. ($product->dateAdded() == $product->dateUpdated() ? '-' : $product->dateUpdated()). '</td>
                    <td style="vertical-align:middle;"><a href="index.php?module=admin_products&amp;action=admin_products_show&amp;modifier='.htmlspecialchars($product->id()). '">Update</a> | <a href="index.php?module=admin_products&amp;action=admin_products_show&amp;supprimer='.htmlspecialchars($product->id()). '">Delete</a></td>
                </tr>
            </tbody>'. "\n";
            ?>
        </table>
    </aside>
</section>