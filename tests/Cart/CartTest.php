<?php


namespace DealerGroup\Tests\Cart;

use DealerGroup\Cart\Cart;
use DealerGroup\Entity\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testAddProductIfOk()
    {
        $product = $this->buildProduct(1, 'test', 5555);
        $cart = new Cart();
        $cart->addItem($product, 15);
        $this->assertSame($cart->getItems()[$cart->getProductIndex($product)]->getProduct(), $product);
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
        $cart->addItem($product, 50);
        $cart->addItem($product2, 50);
        $cart->removeItem($product);
        $this->assertNotContains($cart->getItems(), [$product]);
    }

    /*public function testIt()
    {
        $product = $this->buildProduct(1, 'test', 1899);
        $cart = new Cart();
        $cart->addItem($product);
        var_dump($cart->getCart() + $cart->getCart());
    }*/

    private function buildProduct($id, string $name, int $unitPrice)
    {
        return (new Product())->setId($id)->setName($name)->setUnitPrice($unitPrice);
    }
}
