<?php


namespace DealerGroup\Entity;

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
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->checkIfQuantityIsProper($quantity);
        $this->quantity = $quantity;
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
     * @param $quantity
     * @throws \Exception
     */
    private function checkIfQuantityIsProper(int $quantity)
    {
        if ($quantity < $this->product->getMinimumQuantity()) {
            throw new \Exception('Minimum quantity is 1.'); // should be OutOfBoundException
        }
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
