<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 7/1/14
 * Time: 5:16 PM
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
        <div class="col-sm-3" style="height: 55px; color: #ffffff;"><a style="color: #ffffff;" href="http://yafabhi.com/index.php?module=contact&action=contact_admin">Contact Admin</a></div>
    </div>

    <aside class="row" style="rgba(255,255,255,0.3); text-align: center;">
        <div class="col-md-12">


            <?php
            if(!empty($autres_erreurs))
            {
                echo '<ul list-style-type="none" style="color:red;">'."\n";
                foreach($autres_erreurs as $e)
                {
                    echo '<li style="color:green;backgroung-color:lightgreen; border-radius:3px; padding:5px 15px;">'.$e.'</li>'."\n";
                }
                echo '<ul>';
            }


            ?>

            <div class="row">
                <div id="form" class="col-md-12">
                    <span style="color: white; float:right;margin-right: 30px;"><a class="btn btn-primary" id="decnx" href="index.php?module=admin_products&action=admin_products_show&log_out=1">Log Out</a></span>
                    <form action="" method="post" enctype="multipart/form-data" class="well">
                        <p style="text-align: center; color:#7A7A7A; padding-top:50px; padding-bottom:50px;" >

                            <?php
                            if(isset($message))
                            {
                                echo '<span style="color:green;backgroung-color:lightgreen; border-radius:3px; padding:5px 15px;">'.$message.'</span>';
                            }


                            ?>

                        <!--<div id="entry">-->

                            <fieldset>
                                <legend style="font-size: 130%;"><strong>Add / Delete or Update Products</strong></legend>
                                <br>
                                <br>
                                <div class="form-group">
                                    <p>
                                        <input class="form-control" type="text" name="title" size="50%" placeholder="Title" value="<?php if(isset($product)) echo $product->title(); ?>" />
                                        <?php if (isset($erreurs) && in_array(Product::TITLE_INVALIDE, $erreurs)) echo '<span style="color:red;">The title info is not valid.</span>'; ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <p>
                                        <input class="form-control" type="text" size="50%" name="price" id="price" placeholder="Price"  value="<?php if(isset($product)) echo $product->price(); ?>" />
                                        <?php if (isset($erreurs) && in_array(Product::PRICE_INVALIDE, $erreurs)) echo '<span style="color:red;">The price info in not valid.</span>'; ?>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <p>
                                        <label for="category">Category :</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="-" selected="selected"></option>
                                            <option value="<?php if(isset($product)) echo $product->category();   ?>" selected="selected"><?php if(isset($product)) echo $product->category();   ?></option>
                                            <option value="smartphones">smartphones </option>
                                            <option value="phones">phones </option>
                                            <option value="tablets">tablets </option>
                                        </select>
                                        <?php if (isset($erreurs) && in_array(Product::CATEGORY_INVALIDE, $erreurs)) echo '<span style="color:red;">Please specify the category.</span>'; ?>

                                    </p>
                                </div>
                                <div class="form-group">
                                    <p>
                                        <textarea class="form-control" rows="8" placeholder="Product description" cols="60%" name="description"><?php if (isset($product)) echo $product->description(); ?></textarea><br />
                                        <?php if (isset($erreurs) && in_array(Product::DESCRIPTION_INVALIDE, $erreurs)) echo '<span style="color:red;">Invalid description info.</span>'; ?></td>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <p>
                                        <label for="image">Download the product picture :</label><input class="form-control" type="file"  name="image" id="image" value="<?php if(isset($product)) echo '<img class="flottant_gauche" src="images_uploads/'.htmlspecialchars($product->id()).'.'.strtolower(pathinfo($product->image(), PATHINFO_EXTENSION)).'" title="<?php echo htmlspecialchars($product->title()); ?>" />'; ?>" />
                                    </p>

                                </div>




                                </fieldset>
                                <div class="form-group">
                                    <td>&nbsp;</td>
                                </div>

                                <div class="form-group">
                                    <p>&nbsp;</p>
                                    <?php
                                    if(isset($product) && !$product->isNew())
                                    {
                                        ?>

                                        <input type="hidden" name="id" value="<?php echo $product->id(); ?>" />
                                        <p align="right"><button type="submit" name="submit" class="btn btn-primary">Update</button></p>

                                    <?php
                                    }
                                    else
                                    {
                                    ?>

                                    <p align="middle"><button class="btn btn-primary" type="submit" name="submit">Add</button></p>
                                </div>
                        <!--</div>-->
                        <?php
                        }

                        ?>

                        </p>
                    </form>

                </div>
            </div>

            <br>
            <?php
            if(isset($message))
                echo $message;
            ?>
            <br>
            <p style="text-align: center; color: #ffffff;">Currently, there are <?php echo
                htmlspecialchars($manager_product->count()); ?> products in the database.</p>
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
        </div>
    </aside>


</section>

