<?php

namespace app\engine;

use app\traits\TSingletone;

class Db {
    use TSingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost:3306',
        'login' => 'root',
        'password'=> '',
        'database' => 'php2',
        'charset' => 'utf8'
    ];
    private $connection = null; // объект PDO



    private function getConnection() {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function prepareDsnString() {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    private function query($sql, $params)
    {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function queryOneObject($sql, $params, $class)
    {
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);

        return $stmt->fetch();
    }


    public function queryOne($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }


    public function queryAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params = []) {
        return $this->query($sql, $params)->rowCount();
    }

}