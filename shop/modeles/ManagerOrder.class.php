<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 8/22/14
 * Time: 8:47 PM
 */

abstract class ManagerOrder
{
    abstract public function add(Order $order);
    abstract public function delete($id);
    abstract public function update(Order $order);

    public function save(Order $order)
    {
        if($order->isValid())
        {
            $order->isNew()? $this->add($order):$this->add($order);
        }
        else
        {
            throw new RuntimeException('Order infos are not valid!');
        }
    }

    abstract public function count();
    abstract public function getList($debut=-1, $limite=-1);
    abstract public function getUnique($id);
} 