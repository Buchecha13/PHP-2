<?php


namespace app\controllers;

use app\engine\App;

class CatalogController extends Controller
{
    public function actionIndex() {

        $products = App::call()->productRepository->getAll();

        echo $this->render('catalog', [
            'products' => $products
        ]);
    }

    public function actionCard() {
        $id = (int)$_GET['id'];
        $product = App::call()->productRepository->getOne($id);

        echo $this->render('card', [
            'product' => $product
        ]);
    }

}