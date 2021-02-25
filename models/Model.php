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
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
//        return Db::getInstance()->queryOne($sql, ['id' => $id]);
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }
        //READ All
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }


    public function delete() {
        $tableName = $this->getTableName();
        $sql = "DELETE * FROM {$tableName} WHERE id = :id";

        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    abstract public function getTableName();
}