<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $price;
    public $description;

    public function __construct($name = null, $price = null, $description = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    public static function getTableName()
    {
        return 'products';
    }
}
