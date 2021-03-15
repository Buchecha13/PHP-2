<?php


namespace app\models\entities;


use app\engine\Db;
use app\models\Model;

class Cart extends Model
{
    protected $id = null;
    protected $product_id;
    protected $session_id;

    protected $properties = [
        'product_id' => false,
        'session_id' => false
    ];

    public function __construct($product_id = null, $session_id = null)
    {
        $this->product_id = $product_id;
        $this->session_id = $session_id;
    }
}
