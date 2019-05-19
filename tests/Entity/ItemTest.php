<?php


namespace DealerGroup\Tests\Entity;

use DealerGroup\Entity\Exception\InvalidItemQuantityException;
use DealerGroup\Entity\Item;
use DealerGroup\Entity\Product;
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
        return new Item(new Product($id, $name, $unitPrice), $quantity);
    }
}
