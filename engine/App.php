<?php


namespace app\engine;


use app\traits\TSingletone;

use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;
use app\models\repositories\OrderRepository;
use app\engine\TwigRender;

/**
 * class App
 * @property Storage $components
 *
 * @property Db $db
 * @property Request $request
 * @property Session $session
 * @property TwigRender $twigRender
 * @property CartRepository $cartRepository
 * @property ProductRepository $productRepository
 * @property UserRepository $userRepository
 * @property OrderRepository $orderRepository
 */
class App
{
    use TSingletone;

    public $config;
    private $components;

    private $controller;
    private $action;

    public function run($config) {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    public static function call() {
        return static::getInstance();
    }

    public function createComponent($name) {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    public function __get($name) {
        return $this->components->get($name);
    }

    public function runController() {
        $this->controller = $this->request->getControllerName() ?: 'index';
        $this->action = $this->request->getActionName();

        $controllerClass = $this->config['CONTROLLER_NAMESPACE'] . ucfirst($this->controller) . 'Controller';

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            $controller->runAction($this->action);
        } else {
            echo "Неправильный контроллер";
        }
    }

}