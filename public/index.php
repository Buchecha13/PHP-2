<?php

include_once dirname($_SERVER['DOCUMENT_ROOT']) . "/config/config.php";

use app\models\Product;
use app\engine\Db;
use app\models\User;

spl_autoload_register([new \app\engine\Autoload(), 'loadClass']);

//CREATE
$user = new User();
$user = $user->getOne(2);
var_dump($user->delete());






exit();


























/*
//READ
$product = new Product(new Db());
$product->getOne(5);
$product->getAll();

//DELETE
$product = new Product(new Db());
$product->getOne(5);
//$product->delete();

//UPDATE
$product = new Product(new Db());
$product->getOne(5);
//$product->update();
*/