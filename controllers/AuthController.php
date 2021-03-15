<?php


namespace app\controllers;


use app\engine\Request;
use app\models\repositories\UserRepository;


class AuthController extends Controller
{
    private $authStatus;

    public function actionLogin()
    {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];
        $saveUser = (new Request())->getParams()['save'];

        if ((new UserRepository())->auth($login, $pass)) {
            if (isset($saveUser)) {
                $hash = uniqid(rand(), true);
                $id = $_SESSION['auth']['id'];
                $user = (new UserRepository())->getOne($id);
                $user->hash = $hash;
                (new UserRepository())->update($user);
                setcookie("hash", $hash, time() + 3600, '/');
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            exit("Error");
        }
    }

    public function actionLogout()
    {
        setcookie('hash', "", time() - 1, '/');
        session_destroy();
        header("Location:" . $_SERVER['HTTP_REFERER']);
        exit();
    }


}