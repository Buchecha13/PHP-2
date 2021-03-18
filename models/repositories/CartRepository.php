<?php


namespace app\models\repositories;


use app\engine\App;
use app\models\entities\Cart;
use app\models\Repository;

class CartRepository extends Repository
{
    public function getCart($session_id): array
    {
        $sql = "SELECT carts.id cart_id, products.id product_id, products.name product_name, products.img product_img, products.price product_price FROM `carts`,`products` WHERE `session_id` = '{$session_id}' AND carts.product_id = products.id";

        return App::call()->db->queryAll($sql);
    }

    protected function getTableName(): string
    {
        return 'carts';
    }

    protected function getEntityClass()
    {
        return Cart::class;
    }
}