<?php

namespace app\models\entities;

use app\models\Model;

class Product extends Model
{
    protected $id = null;
    protected $name;
    protected $price;
    protected $description;
    protected $img;

    protected $properties = [
        'name' => false,
        'price' => false,
        'description' => false,
        'img' => false
    ];

    public function __construct($name = null, $price = null, $description = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}
