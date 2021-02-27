<?php


namespace app\models;


class Order extends Model
{
    public $id;
    public $clientName;
    public $clientPhone;

    public function __construct($clientName = null, $clientPhone = null)
    {
        $this->clientName = $clientName;
        $this->clientPhone = $clientPhone;
    }

    public static function getTableName()
    {
        return 'orders';
    }
}