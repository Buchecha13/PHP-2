<?php


namespace app\models\repositories;


use app\engine\App;
use app\engine\Session;
use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{

    protected function getTableName()
    {
        return 'users';
    }

    protected function getEntityClass()
    {
        return User::class;
    }

    public function auth($login, $pass)
    {
        $user = App::call()->userRepository->getWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            App::call()->session->setAuth('login', $login);
            App::call()->session->setAuth('id', $user->id);
            return true;
        } else {
            return false;
        }

    }

    public function getUserName()
    {
        $user = App::call()->session->getAuth('login');

        if (isset($user)) {
            return $user;
        } else {
            return 'Гость';
        }

    }

    public function isAuth()
    {
        if (isset($_COOKIE['hash']) && !isset($_SESSION['auth']['login'])) {
            $hash = $_COOKIE['hash'];

            if ($this->getWhere('hash', $hash)) {
                $user = $this->getWhere('hash', $hash);

                App::call()->session->setAuth('login', $user->login);

                $authUser = App::call()->session->getAuth('login');
            }
        } else {
            $authUser = App::call()->session->getAuth('login');
        }

        return isset($authUser);
    }
}