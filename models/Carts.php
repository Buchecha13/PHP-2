<?php


namespace app\models;


class Carts extends Model
{
    public $id;
    public $productId;
    public $sessionId;

    public function getTableName()
    {
        return 'carts';
    }
}