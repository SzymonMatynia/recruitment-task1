<?php
declare(strict_types=1);

namespace DealerGroup\Tests\Model;

use DealerGroup\Factory\Cart\CartFactory;
use DealerGroup\Model\Cart;
use DealerGroup\Model\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    use BuildProductTrait;

    public function testAddProductWhenIsCorrect()
    {
        $product = $this->buildProduct(1, 'test', 5555);
        $cart = (new CartFactory())->create();
        $cart->addItem($product, 15);
        $this->assertSame($cart->getItems()[$cart->getProductIndex($product)]->getProduct(), $product);
    }

    public function testAddItemWhenIsNotCorrect()
    {
        $this->expectException(\TypeError::class);
        $product = 5;
        $cart = (new CartFactory())->create();
        $cart->addItem($product, 15);
    }

    public function testIfSameProductsAddQuantityOnly()
    {
        $product = $this->buildProduct(1, "addQuan", 5000);

        $cart = (new CartFactory())->create();
        $cart->addItem($product, 50)->addItem($product, 50);
        $this->assertEquals($cart->getItems()[$cart->getProductIndex($product)]->getQuantity(), 100);
    }

    public function testIfQuantityIsOneIfNotSupplied()
    {
        $product = $this->buildProduct(1, 'test', 185186);
        $cart = (new CartFactory())->create();
        $cart->addItem($product);
        $this->assertEquals($cart->getItems()[$cart->getProductIndex($product)]->getQuantity(), 1);
    }

    public function testIfItRemovesElements()
    {
        $product = $this->buildProduct(1, 'test', 185186);
        $product2 = $this->buildProduct(2, 'test2', 133);
        $cart = (new CartFactory())->create();
        $cart->addItem($product, 50)->addItem($product2, 50)->removeItem($product);
        $this->assertNotContains($cart->getItems(), [$product]);
    }
}
