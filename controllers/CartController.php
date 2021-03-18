<?php


namespace app\controllers;


use app\engine\App;
use app\models\entities\Cart;
use app\models\entities\Order;


class CartController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('cart', [
            'cart' => App::call()->cartRepository->getCart(session_id())
        ]);
    }

    public function actionAdd()
    {
        $id = App::call()->request->getParams()['id'];

        $session_id = App::call()->session->getId();

        $cart = new Cart($id, $session_id);

        App::call()->cartRepository->save($cart);

        $response = [
            'success' => 'ok',
            'cartCount' => App::call()->cartRepository->getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();

    }

    public function actionDelete()
    {
        $id = App::call()->request->getParams()['id'];

        $session_id = App::call()->session->getId();

        $product = App::call()->cartRepository->getWhereAnd(['id', 'session_id'], [$id, $session_id]);
        App::call()->cartRepository->delete($product);

        $response = [
            'success' => 'ok',
            'cartCount' => App::call()->cartRepository->getCountWhere('session_id', session_id()),
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionOrder()
    {
        $session_id = App::call()->session->getId();
        $name = App::call()->request->getParams()['name'];
        $phone = App::call()->request->getParams()['phone'];
        $order = new Order($name,$phone,$session_id);
        App::call()->orderRepository->insert($order);
        App::call()->session->regenerateId();

        $response = [
            'success' => 'ok',
            'cartCount' => App::call()->cartRepository->getCountWhere('session_id', App::call()->session->getId()),
        ];

        header('Location', $_SERVER['HTTP_REFERER']);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit();
    }
}