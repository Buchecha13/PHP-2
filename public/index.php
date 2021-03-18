<?php
session_start();

use app\engine\App;

include_once '../vendor/autoload.php';

$config = include '../config/config.php';

try {

    App::call()->run($config);

} catch (Exception $exception) {

    var_dump($exception->getMessage());

}