<?php


namespace DealerGroup\Entity;

class Product
{
    private $name;
    private $price;
    private $minimumQuantity = 1;

    /**
     * Product constructor.
     * @param $name
     * @param $price
     * @param int $minimumQuantity
     */
    public function __construct($name, $price, $minimumQuantity = 1)
    {
        $this->name = $name;
        $this->price = $price;
        $this->minimumQuantity = $minimumQuantity;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
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
     */
    public function setMinimumQuantity(int $minimumQuantity): void
    {
        $this->minimumQuantity = $minimumQuantity;
    }
}
