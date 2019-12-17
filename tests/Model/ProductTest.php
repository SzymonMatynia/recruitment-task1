<?php
declare(strict_types=1);

namespace DealerGroup\Tests\Model;

use DealerGroup\Model\Exception\InvalidMinimumQuantityException;
use DealerGroup\Model\Exception\InvalidUnitPriceException;
use DealerGroup\Model\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    use BuildProductTrait;

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
}
