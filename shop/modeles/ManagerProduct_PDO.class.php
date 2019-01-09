<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 7/2/14
 * Time: 3:55 PM
 */
class ManagerProduct_PDO
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function add(Product $product)
    {
        $requete = $this->db->prepare('INSERT INTO product SET price=:price, title=:title,category=:category, description=:description, dateAdded=NOW(), dateUpdated=NOW()') or die(print_r($this->db->errorInfo()));
        $requete->bindValue(':price', $product->price());
        $requete->bindValue(':title', $product->title());
        $requete->bindValue(':category', $product->category());
        //$requete->bindValue(':image', $product->image());
        $requete->bindValue(':description', $product->description());

        if($requete->execute())
        {
            return $this->db->lastInsertId();
        }
        return errorInfo() ;
    }

    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM product')->fetchColumn();
    }

    public function delete($id)
    {
        $this->db->exec('DELETE FROM product WHERE id='.(int)$id);
    }

    public function getList($debut=-1, $limite=-1)
    {
        $sql = "SELECT id, price, title, description, category, image, DATE_FORMAT(dateAdded, '%b %d, %Y %H:%i') AS dateAdded, DATE_FORMAT(dateUpdated, '%b %d, %Y %H:%i') AS dateUpdated FROM product ORDER BY id DESC";

        if($debut!=-1 || $limite!=-1)
        {
            $sql.=" LIMIT ".(int) $limite." OFFSET ".(int) $debut;
        }

        $req = $this->db->query($sql) or die(print_r($this->db->errorInfo()));

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Product');

        $listeProducts = $req->fetchAll();

        $req->closeCursor();

        return $listeProducts;

    }

    public function getUnique($id)
    {
        $req = $this->db->prepare("SELECT id, price, title, description, category, image, DATE_FORMAT(dateAdded, '%b %d, %Y %H:%i') AS dateAdded, DATE_FORMAT(dateUpdated, '%b %d, %Y %H:%i') AS dateUpdated FROM product WHERE id=:id") or die(print_r($this->db->errorInfo()));
        $req->bindValue(':id',(int)$id, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Product');

        return $req->fetch();
    }

    public function update(Product $product)
    {
        $req = $this->db->prepare('UPDATE product SET price=:price, title=:title, description=:description, category=:category, image=:image, dateUpdated=NOW()
                                    WHERE id=:id');
        $req->bindValue(':price', $product->price());
        $req->bindValue(':title', $product->title());
        $req->bindValue(':category', $product->category());
        $req->bindValue(':image', $product->image());
        $req->bindValue(':description', $product->description());
        $req->bindValue(':id', $product->id(), PDO::PARAM_INT);

        $req->execute();
    }

    function maj_image_product($id_product, $image)
    {

        $requete = $this->db->prepare("UPDATE product SET
        image = :image
        WHERE
        id = :id_product");
        $requete->bindValue(':id_product', $id_product);
        $requete->bindValue(':image', $image);
        return $requete->execute();
    }


}