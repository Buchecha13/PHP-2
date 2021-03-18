<?php

use app\engine\TwigRender;
use app\engine\Request;
use app\engine\Session;
use app\engine\Db;
use app\models\repositories\ProductRepository;
use app\models\repositories\CartRepository;
use app\models\repositories\UserRepository;
use app\models\repositories\OrderRepository;

return [
    'ENGINE' => dirname($_SERVER['DOCUMENT_ROOT']) . '/engine/',
    'ROOT_DIR' => dirname(__DIR__),
    'CONTROLLER_NAMESPACE' => 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR,
    'VIEWS_DIR' => dirname(__DIR__) . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR,
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost:3306',
            'login' => 'root',
            'password' => '',
            'database' => 'php2',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'session' => [
            'class' => Session::class
        ],
        'cartRepository' => [
            'class' => CartRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ],
        'twigRender' => [
            'class' => TwigRender::class
        ]
    ]
];
