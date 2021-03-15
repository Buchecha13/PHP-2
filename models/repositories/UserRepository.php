<?php


namespace app\models\repositories;


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
        $user = $this->getWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
//            $_SESSION['auth']['login'] = $login;
//            $_SESSION['auth']['id'] = $user->id;
            (new Session())->setAuth('login', $login);
            (new Session())->setAuth('id', $user->id);

            return true;
        } else {
            return false;
        }

    }

    public function getUserName()
    {
        $user = (new Session())->getAuth('login');

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

                (new Session())->setAuth('login', $user->login);

                $authUser = (new Session())->getAuth('login');
            }
        } else {
            $authUser = (new Session())->getAuth('login');
        }

        return isset($authUser);
    }
}