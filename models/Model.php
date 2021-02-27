<?php

namespace app\models;


use app\engine\Db;
use app\interfaces\IModels;

abstract class Model implements IModels
{

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
    //CRUD
    //READ One
    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    //READ All
    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return Db::getInstance()->queryAllObjects($sql,static::class);
    }

    public function insert()
    {
        $tableName = $this->getTableName();

        $values = '';
        $params = [];
        foreach ($this as $key => $value) {
            if ($key == 'id' || $key == 'sessionId' || $key == 'orderStatus' || $key == 'orderDate') continue;
            $values .= ":{$key}, ";
            $params [$key] = $value;
        }
        $columns = implode(', ', array_keys($params));
        $values = substr($values, 0, -2);

        $sql = "INSERT INTO {$tableName} ($columns) VALUES ($values)";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }

    public function delete()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";

        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    abstract static public function getTableName();
}