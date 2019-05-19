<?php


namespace DealerGroup\Entity;

use DealerGroup\Entity\Exception\InvalidItemQuantityException;
use DealerGroup\Entity\Product;

class Item
{
    private $product;
    private $quantity;

    /**
     * Item constructor.
     * @param \DealerGroup\Entity\Product $product
     * @param $quantity
     * @throws \Exception
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param $requestedQuantity
     * @return $this
     * @throws \Exception
     */
    public function changeItemQuantity($requestedQuantity)
    {
        $this->checkIfQuantityIsProper($requestedQuantity);

        $this->quantity = $requestedQuantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param $quantity
     * @return $this
     * @throws \Exception
     */
    public function setQuantity($quantity)
    {
        $this->checkIfQuantityIsProper($quantity);
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return \DealerGroup\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param \DealerGroup\Entity\Product $product
     * @return $this
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @param int $quantity
     */
    private function checkIfQuantityIsProper(int $quantity)
    {
        if ($quantity < $this->product->getMinimumQuantity()) {
            throw new InvalidItemQuantityException('Minimum quantity is ' . $this->product->getMinimumQuantity());
        }
    }
}
