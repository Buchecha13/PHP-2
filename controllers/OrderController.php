<?php


namespace app\controllers;

use app\models\repositories\OrderRepository;

class OrderController extends Controller
{
    public function actionIndex() {

        $orders = (new OrderRepository())->getAll();

        echo $this->render('orders', [
            'orders' => $orders
        ]);
    }
}