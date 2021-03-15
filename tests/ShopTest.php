<?php

use PHPUnit\Framework\TestCase;

use app\models\entities\Product;

class ShopTest extends TestCase
{
    /**
     * @dataProvider providerProductConstructor
     */
    public function testProductConstructor($name, $price, $description) {
         $product = new Product($name, $price, $description);
         $this->assertIsObject($product);
         $this->assertEquals($name, $product->name);
         $this->assertEquals($price, $product->price);
         $this->assertEquals($description, $product->description);
    }
    public function providerProductConstructor () {
        return [
            [NULL, NULL, NULL],
            ['testname','qwe', 'Описание']
        ];
    }

    public function testProductGetTable() {
        $product = new \app\models\repositories\ProductRepository();
        $productTableName = $product->getTableName();

        $this->assertEquals($productTableName, 'products');
    }
}