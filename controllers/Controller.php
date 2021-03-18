<?php


namespace app\controllers;

use app\engine\App;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';



    public function runAction($action = null)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = 'action' . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        }
    }

    public function render($template, $params = [])
    {
        $params['isAuth'] = App::call()->userRepository->isAuth();
        $params['name'] = App::call()->userRepository->getUserName();

        return App::call()->twigRender->render($template . '.twig', $params);
    }
}