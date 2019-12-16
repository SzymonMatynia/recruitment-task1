<?php
declare(strict_types=1);

namespace DealerGroup\Tests\Model;

use DealerGroup\Factory\Product\ProductFactory;

trait BuildProductTrait
{
    public function buildProduct($id, string $name, int $unitPrice)
    {
        return (new ProductFactory())->create()->setId($id)->setName($name)->setUnitPrice($unitPrice);
    }
}
