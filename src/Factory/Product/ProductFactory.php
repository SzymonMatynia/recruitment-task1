<?php
declare(strict_types=1);

namespace DealerGroup\Factory\Product;

use DealerGroup\Model\Product;

class ProductFactory implements ProductFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(): Product
    {
        return new Product();
    }
}
