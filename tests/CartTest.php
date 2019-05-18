<?php


namespace DealerGroup\Tests;

use DealerGroup\Cart;
use DealerGroup\Entity\Item;
use DealerGroup\Entity\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testIfEverythingIsOk()
    {
        $product = new Product('testName', 5000);
        $item = new Item($product);

        $item2 = new Item($product);


        $cart = new Cart();
        $cart->addItem($item, 10);

        var_dump($cart->getCart());
    }
}
