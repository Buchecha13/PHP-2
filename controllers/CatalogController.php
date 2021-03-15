<?php


namespace app\controllers;

use app\models\repositories\ProductRepository;

class CatalogController extends Controller
{
    public function actionIndex() {

        $products = (new ProductRepository())->getAll();

        echo $this->render('catalog', [
            'products' => $products
        ]);
    }

    public function actionCard() {
        $id = (int)$_GET['id'];
        $product = (new ProductRepository())->getOne($id);

        echo $this->render('card', [
            'product' => $product
        ]);
    }

}