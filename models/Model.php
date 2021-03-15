<?php

namespace app\models;


use app\engine\Db;
use app\interfaces\IModels;

abstract class Model
{
    public function __isset($name)
    {
        if (isset($name)) {
            return true;
        }
        return false;
    }


    protected $properties = [];

    public function __set($name, $value)
    {
            $this->properties[$name] = true;
            $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

}