<?php


namespace app\models\entities;


use app\engine\App;
use app\models\Model;

class Order extends Model
{
    protected $id = null;
    protected $clientName;
    protected $clientPhone;
    protected $session_id;
    protected $order_date;
    protected $status;

    protected $properties= [
        'clientName' => false,
        'clientPhone' => false,
        'session_id' => false
    ];

    public function __construct($clientName = null, $clientPhone = null, $session_id = null)
    {
        $this->clientName = $clientName;
        $this->clientPhone = $clientPhone;
        $this->session_id = App::call()->session->getId();
    }
}