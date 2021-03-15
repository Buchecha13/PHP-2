<?php


namespace app\controllers;

use app\engine\TwigRender;

use app\models\repositories\UserRepository;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $renderer;


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
        $this->renderer = new TwigRender();

        $params['isAuth'] = (new UserRepository())->isAuth();
        $params['name'] = (new UserRepository())->getUserName();

        return $this->renderer->render($template . '.twig', $params);
    }
}