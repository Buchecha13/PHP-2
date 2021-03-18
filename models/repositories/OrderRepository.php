<?php


namespace app\models\repositories;


use app\engine\App;
use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{


    protected function getTableName()
    {
        return 'orders';
    }

    protected function getEntityClass()
    {
        return Order::class;
    }

    public function getOrderProducts($session_id): array
    {
        $sql = "SELECT products.name product_name, products.price product_price FROM `carts`,`products` WHERE `session_id` = '{$session_id}' AND carts.product_id = products.id";

        return App::call()->db->queryAll($sql);
    }

    public function getOrderStatus($order_id) {
        $order = App::call()->orderRepository->getOne($order_id);

        switch ($order->status) {
            case 'new':
                $status = 'Новый';
                break;
            case 'processed':
                $status = 'В обработке';
                break;
            case 'done':
                $status = 'Выполнен';
                break;
            case 'canceled':
                $status = 'Отменен';
                break;
        }

        return $status;
    }
}