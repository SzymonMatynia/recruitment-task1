<?php


namespace DealerGroup\Entity;

class Product
{
    private $name;
    private $unitPrice;
    private $minimumQuantity = 1;

    /**
     * Product constructor.
     * @param $name
     * @param $unitPrice
     */
    public function __construct($name, $unitPrice)
    {
        $this->name = $name;
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param $unitPrice
     */
    public function setUnitPrice($unitPrice): void
    {
        $this->unitPrice = $unitPrice;
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
    private function checkIfProperMinimumQuantitySupplied($minimumQuantity)
    {
        if ($minimumQuantity < 1) {
            throw new \Exception('Quantity can not be less than 1. Yours is equal to: ' . $minimumQuantity);
        }
    }
}
