<?php


namespace app\controllers;


use app\engine\Request;
use app\engine\Session;
use app\models\entities\Cart;
use app\models\repositories\CartRepository;

class CartController extends Controller
{
    public function actionIndex()
    {
        $cart = (new CartRepository())->getCart(session_id());

        echo $this->render('cart', [
            'cart' => $cart
        ]);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()['id'];

        $session_id = (new Session())->getId();

        $cart = new Cart($id, $session_id);

        (new CartRepository())->save($cart);

        $response = [
            'success' => 'ok',
            'cartCount' => (new CartRepository())->getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();

    }

    public function actionDelete()
    {
        $id = (new Request())->getParams()['id'];

        $session_id = (new Session())->getId();

        $product = (new CartRepository())->getWhereAnd(['id', 'session_id'], [$id, $session_id]);
        (new CartRepository())->delete($product);

        $response = [
            'success' => 'ok',
            'cartCount' => (new CartRepository())->getCountWhere('session_id', session_id()),
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}