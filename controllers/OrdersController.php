<?php


namespace app\controllers;

use app\engine\App;
use app\models\repositories\OrderRepository;

class OrdersController extends Controller
{
    public function actionIndex()
    {
        $statuses = [];
        $refactorOrders = [];
        $orders = App::call()->orderRepository->getAll();

        foreach ($orders as $order) {
            switch ($order['status']) {
                case 'new':
                    $statuses ['status'] = 'Новый';
                    break;
                case 'processed':
                    $statuses ['status'] = 'В обработке';
                    break;
                case 'done':
                    $statuses ['status'] = 'Выполнен';
                    break;
                case 'canceled':
                    $statuses ['status'] = 'Отменен';
                    break;
            }
            $order = array_merge($order, $statuses);
            $refactorOrders [] = $order;
        }

        if (App::call()->userRepository->isAuth()) {
            echo $this->render('orders', [
                'statuses' => $statuses,
                'orders' => $refactorOrders
            ]);
        } else {
            header("Location: /");
            exit();
        }

    }

    public function actionOrder()
    {
        $id = (int)App::call()->request->getParams()['id'];
        $order = App::call()->orderRepository->getOne($id);
        $status = App::call()->orderRepository->getOrderStatus($id);


        $session_id = $order->session_id;
        $products = App::call()->orderRepository->getOrderProducts($session_id);


        echo $this->render('order', [
            'status' => $status,
            'order' => $order,
            'products' => $products
        ]);
    }

    public function actionChangeOrderStatus()
    {

        $id = (int)App::call()->request->getParams()['id'];
        $status = App::call()->request->getParams()['status'];



        $order = App::call()->orderRepository->getOne($id);
        $order->status = $status;
        App::call()->orderRepository->save($order);

        $textStatus = App::call()->orderRepository->getOrderStatus($id);

        $response = [
            'success' => 'ok',
            'textStatus' => $textStatus
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();

    }
}