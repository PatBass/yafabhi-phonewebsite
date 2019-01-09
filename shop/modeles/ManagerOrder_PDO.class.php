<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 8/22/14
 * Time: 8:45 PM
 */

class ManagerOrder_PDO
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function add(Order $order)
    {
        $requete = $this->db->prepare("INSERT INTO products_order SET company_name=:company_name, address=:address,country=:country, order_amount=:order_amount, cart_detail=:cart_detail, tel=:tel, pwd=:pwd, fax=:fax, note=:note, contact_name=:contact_name, email=:email, shipping_address=:shipping_address, registration_number=:registration_number, dateAdded=NOW()");
        $requete->bindValue(':company_name', $order->company_name());
        $requete->bindValue(':address', $order->address());
        $requete->bindValue(':country', $order->country());
        $requete->bindValue(':tel', $order->tel());
        $requete->bindValue(':pwd', $order->pwd());
        $requete->bindValue(':fax', $order->fax());
        $requete->bindValue(':note', $order->note());
        $requete->bindValue(':contact_name', $order->contact_name());
        $requete->bindValue(':email', $order->email());
        $requete->bindValue(':order_amount', $order->order_amount());
        $requete->bindValue(':cart_detail', $order->cart_detail());
        $requete->bindValue(':shipping_address', $order->shipping_address());
        $requete->bindValue(':registration_number', $order->registration_number());


        if($requete->execute())
        {
            return $this->db->lastInsertId();
        }
        return errorInfo() ;
    }

    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM products_order')->fetchColumn();
    }

    public function delete($id)
    {
        $this->db->exec('DELETE FROM products_order WHERE id='.(int)$id);
    }

    public function getList($debut=-1, $limite=-1)
    {
        $sql = "SELECT id, company_name, address, country, order_amount=:order_amount, cart_detail=:cart_detail, tel, fax, registration_number, note, shipping_address, email, contact_name, DATE_FORMAT(dateAdded, '%b %d, %Y %H:%i') AS dateAdded FROM products_order ORDER BY id DESC";

        if($debut!=-1 || $limite!=-1)
        {
            $sql.=" LIMIT ".(int) $limite." OFFSET ".(int) $debut;
        }

        $req = $this->db->query($sql) or die(print_r($this->db->errorInfo()));

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order');

        $orderList = $req->fetchAll();

        $req->closeCursor();

        return $orderList;

    }

    public function getUnique($id)
    {
        $req = $this->db->prepare("SELECT id, company_name, address, country, order_amount=:order_amount, cart_detail=:cart_detail, tel, fax, registration_number, note, shipping_address, email, contact_name, DATE_FORMAT(dateAdded, '%b %d, %Y %H:%i') AS dateAdded, DATE_FORMAT(dateUpdated, '%b %d, %Y %H:%i') AS dateUpdated FROM products_order WHERE id=:id") or die(print_r($this->db->errorInfo()));
        $req->bindValue(':id',(int)$id, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order');

        return $req->fetch();
    }

    public function update(Order $order)
    {
        $req = $this->db->prepare('UPDATE products_order SET company_name=:company_name, pwd=:pwd, order_amount=:order_amount, cart_detail=:cart_detail, address=:address,country=:country, tel=:tel, fax=:fax, note=:note, contact_name=:contact_name, email=:email, shipping_address=:shipping_address, registration_number=:registration_number
                                    WHERE id=:id');
        $req->bindValue(':company_name', $order->company_name());
        $req->bindValue(':address', $order->address());
        $req->bindValue(':country', $order->country());
        $req->bindValue(':tel', $order->tel());
        $req->bindValue(':fax', $order->fax());
        $req->bindValue(':email', $order->email());
        $req->bindValue(':pwd', $order->pwd());
        $req->bindValue(':order_amount', $order->order_amount());
        $req->bindValue(':cart_detail', $order->cart_detail());
        $req->bindValue(':registration_number', $order->registration_number());
        $req->bindValue(':contact_name', $order->contact_name());
        $req->bindValue(':note', $order->note());
        $req->bindValue(':shipping_address', $order->shipping_address());
        $req->bindValue(':id', $order->id(), PDO::PARAM_INT);

        $req->execute();
    }

    public function combinaison_connexion_valide($email, $pwd)
    {
        $requete = $this->db->prepare("SELECT id FROM products_order WHERE email=:email AND pwd=:pwd");
        $requete->bindValue(':email', $email);
        $requete->bindValue(':pwd', $pwd);
        $requete->execute();

        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order');


        if($objet = $requete->fetch())
        {
            $requete->closeCursor();
            return $objet->id();

        }

        return false;
    }

    public function lire_infos_utilisateur($id_order)
    {
        $requete = $this->db->prepare("SELECT id, company_name, address, country, order_amount=:order_amount, cart_detail=:cart_detail, tel, fax, registration_number, note, shipping_address, email, contact_name, DATE_FORMAT(dateAdded, '%b %d, %Y %H:%i') AS dateAdded, DATE_FORMAT(dateUpdated, '%b %d, %Y %H:%i') AS dateUpdated FROM products_order WHERE id=:id");
        $requete->bindValue(':id', $id_order, PDO::PARAM_INT);

        $requete->execute();

        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Order');


        if($objet = $requete->fetch())
        {
            $requete->closeCursor();
            return $objet;

        }

        return false;
    }



} 