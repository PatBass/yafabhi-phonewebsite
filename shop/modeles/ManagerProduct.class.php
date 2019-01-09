<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 7/2/14
 * Time: 3:45 PM
 */
abstract class ManagerProduct {

    abstract public function add(Product $product);
    abstract public function delete($id);
    abstract public function update(Product $product);

    public function save(Product $product)
    {
        if($product->isValid())
        {
            $product->isNew()? $this->add($product):$this->add($product);
        }
        else
        {
            throw new RuntimeException('Product infos are not valid!');
        }
    }

    abstract public function count();
    abstract public function getList($debut=-1, $limite=-1);
    abstract public function getUnique($id);
}