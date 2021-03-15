<?php


namespace app\models\entities;


use app\models\Model;

class Order extends Model
{
    protected $id = null;
    protected $clientName;
    protected $clientPhone;

    protected $properties= [
        'clientName' => false,
        'clientPhone' => false
    ];

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