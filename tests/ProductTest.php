<?php

use PHPUnit\Framework\TestCase;

use app\models\entities\Product;

class ProductTest extends TestCase
{
    /**
     * @dataProvider providerProductConstructor
     */
    public function testProductConstructor($name, $price, $description) {
         $product = new Product($name, $price, $description);

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

    public function testProductObject() {
        $product = new Product();

        $this->assertIsObject($product);
    }

    public function testProductAttributes() {

        $this->assertClassHasAttribute('id', Product::class);
        $this->assertClassHasAttribute('name', Product::class);
        $this->assertClassHasAttribute('price', Product::class);
        $this->assertClassHasAttribute('description', Product::class);
        $this->assertClassHasAttribute('properties', Product::class);
    }

}