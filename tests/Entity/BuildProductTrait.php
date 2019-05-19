<?php


namespace DealerGroup\Tests\Entity;

use DealerGroup\Entity\Product;

trait BuildProductTrait
{
    public function buildProduct($id, string $name, int $unitPrice)
    {
        return (new Product())->setId($id)->setName($name)->setUnitPrice($unitPrice);
    }
}
