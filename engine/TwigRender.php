<?php


namespace app\engine;

use app\models\repositories\CartRepository;

class TwigRender
{

    public  function render($template, $params)
    {
        $loader = new \Twig\Loader\FilesystemLoader(App::call()->config['ROOT_DIR'] . '/templates');

        $twig = new \Twig\Environment($loader, [
            'debug' => true,
        ]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $twig->addGlobal('cartCount', (new CartRepository())->getCountWhere('session_id', session_id()));

        return $twig->render($template, $params);
    }
}