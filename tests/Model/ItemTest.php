<?php
declare(strict_types=1);

namespace DealerGroup\Tests\Model;

use DealerGroup\Factory\Item\ItemFactory;
use DealerGroup\Factory\Product\ProductFactory;
use DealerGroup\Model\Exception\InvalidItemQuantityException;
use DealerGroup\Model\Item;
use DealerGroup\Model\Product;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testIfNotPossibleToSetInvalidQuantity()
    {
        $this->expectException(InvalidItemQuantityException::class);
        $item = $this->buildItem(1, "testInvalidItemQuantityProduct", 500, -55);
    }

    private function buildItem($id, string $name, int $unitPrice, int $quantity)
    {
        $product = (new ProductFactory())->create()->setName($name)->setId($id)->setUnitPrice($unitPrice);
        return (new ItemFactory())->create($product, $quantity);
    }
}
