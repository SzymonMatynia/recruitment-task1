<?php
declare(strict_types=1);

namespace DealerGroup\Tests\Factory;

use DealerGroup\Factory\Item\ItemFactory;
use DealerGroup\Factory\Product\ProductFactory;
use DealerGroup\Model\Exception\InvalidItemQuantityException;
use DealerGroup\Model\Item;
use PHPUnit\Framework\TestCase;

class ItemFactoryTest extends TestCase
{
    public function testInstance()
    {
        $product = (new ProductFactory())->create();
        $item = (new ItemFactory())->create($product, 50);
        $this->assertInstanceOf(Item::class, $item);
    }

    public function testGatheringInstanceWhenQuantityIsBad()
    {
        $this->expectException(InvalidItemQuantityException::class);
        $product = (new ProductFactory())->create();
        $item = (new ItemFactory())->create($product, -1);
        $this->assertInstanceOf(Item::class, $item);
    }

    public function testGatheringInstanceWhenConstructorProductObjectIsSomethingElse()
    {
        $this->expectException(\TypeError::class);
        $product = new \stdClass();
        $item = (new ItemFactory())->create($product, -1);
        $this->assertInstanceOf(Item::class, $item);
    }
}
