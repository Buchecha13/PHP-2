<?php


namespace app\models\repositories;


use app\engine\Db;
use app\models\entities\Cart;
use app\models\Repository;

class CartRepository extends Repository
{
    public function getCart($session_id)
    {
        $sql = "SELECT carts.id cart_id, products.id product_id, products.name product_name, products.img product_img, products.price product_price FROM `carts`,`products` WHERE `session_id` = '{$session_id}' AND carts.product_id = products.id";

        return Db::getInstance()->queryAll($sql);
    }

    protected function getTableName()
    {
        return 'carts';
    }

    protected function getEntityClass()
    {
        return Cart::class;
    }
}