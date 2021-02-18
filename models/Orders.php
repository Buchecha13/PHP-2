<?php


namespace app\models;


class Orders extends Model
{
    public $id;
    public $clientName;
    public $clientPhone;
    public $sessionId;
    public $orderStatus;
    public $orderDate;

    public function getTableName()
    {
        return 'orders';
    }
}