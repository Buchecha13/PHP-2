<?php


namespace app\models;

use app\engine\Db;

abstract class Repository
{
    abstract protected function getTableName();
    abstract protected function getEntityClass();

    //CRUD

//    Получить все записи таблицы
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return Db::getInstance()->queryAll($sql);
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return Db::getInstance()->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getWhere($name, $value)
    {
        $tableName = $this->getTableName();

        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";

        return Db::getInstance()->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getWhereAnd(array $name, array $values)
    {
        $tableName = $this->getTableName();

        $sql = "SELECT * FROM {$tableName} WHERE `{$name[0]}` = ? AND `{$name[1]}` = ?";

        return Db::getInstance()->queryOneObject($sql, $values, $this->getEntityClass());
    }

    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE `{$name}` = :value";

        return Db::getInstance()->queryOne($sql, ['value' => $value])['count'];

    }

    public function insert(Model $entity)
    {
        $tableName = $this->getTableName();

        $values = '';
        $params = [];
        foreach ($entity->properties as $key => $value) {
            $values .= ":{$key}, ";
            $params [$key] = $entity->$key;
        }
        $columns = implode(', ', array_keys($params));
        $values = substr($values, 0, -2);

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params);
        $entity->id = Db::getInstance()->lastInsertId();
    }

    public function update(Model $entity)
    {
        $tableName = $this->getTableName();
        $set = '';
        $params = [];
        foreach ($entity->properties as $key => $value) {
            if (!$value) continue;

            $set .= "`{$key}` = :{$key}, ";
            $params [$key] = $entity->$key;
        }
        $set = substr($set, 0, -2);
        $params['id'] = $entity->id;

        $sql = "UPDATE {$tableName} SET {$set} WHERE id = :id";

        return Db::getInstance()->execute($sql, $params);
    }

    public function delete(Model $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";

        return Db::getInstance()->execute($sql, ['id' => $entity->id]);
    }

    public function save(Model $entity)
    {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
}