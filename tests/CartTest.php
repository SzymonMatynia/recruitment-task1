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
        $item = new Item($product, 9);

        $cart = new Cart();

        $cart->addItem($item);
    }
}
