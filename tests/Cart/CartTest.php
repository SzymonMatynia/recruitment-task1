<?php


namespace DealerGroup\Tests\Cart;

use DealerGroup\Cart\Cart;
use DealerGroup\Entity\Item;
use DealerGroup\Entity\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testAddProductIfOk()
    {
        $product = (new Product())->setId(1)->setName('test')->setUnitPrice(5555);



        $cart = new Cart();
        $cart->addItem($product, 15);
        var_dump($cart->getItems());
    }

    /*public function testIfSameElementsAddQuantity()
    {

    }

    private function buildCart()
    {

    }*/
}
