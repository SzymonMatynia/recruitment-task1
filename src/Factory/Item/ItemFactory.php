<?php
declare(strict_types=1);

namespace DealerGroup\Factory\Item;

use DealerGroup\Model\Item;
use DealerGroup\Model\Product;

class ItemFactory
{

    public function create(Product $product, int $quantity): Item
    {
        return new Item($product, $quantity);
    }
}
