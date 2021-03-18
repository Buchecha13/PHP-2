<?php


namespace app\controllers;


use app\engine\App;


class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];
        $saveUser = App::call()->request->getParams()['save'];
        if (App::call()->userRepository->auth($login, $pass)) {
            if (isset($saveUser)) {
                $hash = uniqid(rand(), true);
                $id = App::call()->session->getAuth('id');
                $user = App::call()->userRepository->getOne($id);
                $user->hash = $hash;
                App::call()->userRepository->update($user);
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
        App::call()->session->destroy();
        header("Location:" . $_SERVER['HTTP_REFERER']);
        exit();
    }


}