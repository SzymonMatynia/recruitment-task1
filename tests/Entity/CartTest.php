<?php


namespace DealerGroup\Tests\Entity;

use DealerGroup\Entity\Cart;
use DealerGroup\Entity\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    use BuildProductTrait;

    public function testAddProductWhenIsCorrect()
    {
        $product = $this->buildProduct(1, 'test', 5555);
        $cart = new Cart();
        $cart->addItem($product, 15);
        $this->assertSame($cart->getItems()[$cart->getProductIndex($product)]->getProduct(), $product);
    }

    public function testAddProductWhenIsNotCorrect()
    {
        $this->expectException(\TypeError::class);
        $product = 5;
        $cart = new Cart();
        $cart->addItem($product, 15);
    }

    public function testIfSameProductsAddQuantityOnly()
    {
        $product = $this->buildProduct(1, "addQuan", 5000);

        $cart = new Cart();
        $cart->addItem($product, 50)->addItem($product, 50);
        $this->assertEquals($cart->getItems()[$cart->getProductIndex($product)]->getQuantity(), 100);
    }

    public function testIfQuantityIsOneIfNotSupplied()
    {
        $product = $this->buildProduct(1, 'test', 185186);
        $cart = new Cart();
        $cart->addItem($product);
        $this->assertEquals($cart->getItems()[$cart->getProductIndex($product)]->getQuantity(), 1);
    }

    public function testIfItRemovesElements()
    {
        $product = $this->buildProduct(1, 'test', 185186);
        $product2 = $this->buildProduct(2, 'test2', 133);
        $cart = new Cart();
        $cart->addItem($product, 50)->addItem($product2, 50)->removeItem($product);
        $this->assertNotContains($cart->getItems(), [$product]);
    }
}
