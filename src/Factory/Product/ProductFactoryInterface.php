<?php
declare(strict_types=1);

namespace DealerGroup\Factory\Product;

use DealerGroup\Model\Product;

interface ProductFactoryInterface
{
    /**
     * @return Product
     */
    public function create(): Product;
}
