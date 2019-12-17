<?php
declare(strict_types=1);

namespace DealerGroup\Model;

use DealerGroup\Model\Exception\InvalidItemQuantityException;
use Exception;

class Item
{
    private $product;
    private $quantity;

    /**
     * Item constructor.
     * @param Product $product
     * @param int $quantity
     * @throws Exception
     */
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->setQuantity($quantity);
    }

    /**
     * @param $requestedQuantity
     * @return $this
     * @throws Exception
     */
    public function changeItemQuantity($requestedQuantity): self
    {
        $this->checkIfQuantityIsProper($requestedQuantity);
        $this->quantity = $requestedQuantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param $quantity
     * @return $this
     * @throws InvalidItemQuantityException
     */
    public function setQuantity(int $quantity): self
    {
        $this->checkIfQuantityIsProper($quantity);
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param int $quantity
     * @throws InvalidItemQuantityException
     */
    private function checkIfQuantityIsProper(int $quantity): void
    {
        if ($quantity < $this->product->getMinimumQuantity()) {
            throw new InvalidItemQuantityException('Minimum quantity is ' . $this->product->getMinimumQuantity());
        }
    }
}
