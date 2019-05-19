<?php


namespace DealerGroup\Entity;

use DealerGroup\Entity\Exception\InvalidMinimumQuantityException;
use DealerGroup\Entity\Exception\InvalidUnitPriceException;

class Product
{
    private $id;
    private $name;
    private $unitPrice;
    private $minimumQuantity = 1;

    /**
     * Product constructor.
     * @param $name
     * @param $unitPrice
     */
    /*public function __construct($id, $name, $unitPrice)
    {
        $this->name = $name;
        $this->unitPrice = $unitPrice;
    }*/

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    /**
     * @param int $unitPrice
     * @return Product
     */
    public function setUnitPrice(int $unitPrice): Product
    {
        $this->checkIfProperUnitPriceSupplied($unitPrice);
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinimumQuantity(): int
    {
        return $this->minimumQuantity;
    }

    /**
     * @param int $minimumQuantity
     * @return Product
     * @throws \Exception
     */
    public function setMinimumQuantity(int $minimumQuantity): Product
    {
        $this->checkIfProperMinimumQuantitySupplied($minimumQuantity);
        $this->minimumQuantity = $minimumQuantity;
        return $this;
    }

    /**
     * @param $minimumQuantity
     * @throws \Exception
     */
    private function checkIfProperMinimumQuantitySupplied($minimumQuantity): void
    {
        if ($minimumQuantity < 1) {
            throw new InvalidMinimumQuantityException('Quantity can not be less than 1. Yours: ' . $minimumQuantity);
        }
    }

    /**
     * @param int $unitPrice
     */
    private function checkIfProperUnitPriceSupplied(int $unitPrice): void
    {
        if ($unitPrice < 0) {
            throw new InvalidUnitPriceException('Unit price shouldn\'t be less than 0, don\'t you think?');
        }
    }
}
