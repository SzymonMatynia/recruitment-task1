<?php


namespace DealerGroup\Tests\Entity;

use DealerGroup\Entity\Exception\InvalidMinimumQuantityException;
use DealerGroup\Entity\Exception\InvalidUnitPriceException;
use DealerGroup\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIfMinimumQuantityCanBeLessThanDefinedOne()
    {
        $product = $this->buildProduct(1, "testProduct", 5555);
        $this->expectException(InvalidMinimumQuantityException::class);
        $product->setMinimumQuantity(-1);
    }

    public function testIfUnitPriceCantBeLessThanZero()
    {
        $this->expectException(InvalidUnitPriceException::class);
        $product = $this->buildProduct(1, "testUnitPrice", -5555);
    }

    private function buildProduct($id, string $name, int $unitPrice)
    {
        return (new Product())->setId($id)->setName($name)->setUnitPrice($unitPrice);
    }
}
