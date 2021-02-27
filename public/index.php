<?php

include_once dirname($_SERVER['DOCUMENT_ROOT']) . "/config/config.php";

use app\models\Product;
use app\engine\Db;
use app\models\User;
use \app\models\Order;

spl_autoload_register([new \app\engine\Autoload(), 'loadClass']);

//CREATE


$user = new User('user', '123');
$user->insert();


//READ

$user = User::getOne(1);
var_dump($user);

$users = User::getAll();
var_dump($users);

//DELETE
/**
 * @var User $user
 */
$user = User::getOne(15);
$user->delete();










