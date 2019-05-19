<?php


namespace DealerGroup\Tests\Entity;

use DealerGroup\Entity\Exception\InvalidItemQuantityException;
use DealerGroup\Entity\Item;
use DealerGroup\Entity\Product;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testIfPossibleToSetInvalidQuantity()
    {
        $this->expectException(InvalidItemQuantityException::class);
        $item = $this->buildItem(1, "testInvalidItemQuantityProduct", 500)->setQuantity(-55);
    }

    private function buildItem(int $id, string $name, int $unitPrice)
    {
        return new Item(new Product($id, $name, $unitPrice));
    }
}
