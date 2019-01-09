<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 6/28/14
 * Time: 7:44 PM
 */
if(isset($_GET['id']))
{
    $id = preg_replace("#[^0-9]#i", "", $_GET['id']);

    $requete = $pdo->prepare("SELECT * FROM products WHERE id=:id LIMIT 1");
    $requete->bindValue(":id", $id, PDO::PARAM_INT);
    $productsCount = $requete->fetchColumn();// Count the output amount
    if($productsCount>0)
    {
        //Get all the product details
        while($row=$requete->fetch(PDO::FETCH_ASSOC))
        {
            $product_name = $row["product_name"];
            $price = $row["price"];
            $specification = $row["specification"];
            $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]) );
        }

        echo "views/products_view.php";
    }
    else
    {
        echo "That item does not exist";
    }
}
else{
    echo "Data to render this page is missing";
    exit;
}