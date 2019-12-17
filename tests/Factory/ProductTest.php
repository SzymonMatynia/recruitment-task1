<?php
declare(strict_types=1);

namespace DealerGroup\Tests\Factory;

use DealerGroup\Factory\Product\ProductFactory;
use DealerGroup\Model\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testInstance()
    {
        $product = (new ProductFactory())->create();
        $this->assertInstanceOf(Product::class, $product);
    }
}
