<?php
session_start();

use app\engine\Request;

include_once dirname($_SERVER['DOCUMENT_ROOT']) . "/config/config.php";


try {
    spl_autoload_register([new \app\engine\Autoload(), 'loadClass']);

    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'index';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();
        $controller->runAction($actionName);
    }
} catch (Exception $exception ) {
    var_dump($exception->getMessage());
}