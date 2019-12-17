<?php
declare(strict_types=1);

namespace DealerGroup\Model;

use DealerGroup\Factory\Item\ItemFactory;
use DealerGroup\Model\Exception\InvalidProductIndexException;

class Cart
{
    private $items = [];
    private $totalPrice;

    /**
     * @param Product $product
     * @param null $quantity
     * @return $this
     * @throws \Exception
     */
    public function addItem(Product $product, int $quantity = null): self
    {
        if ($quantity === null) {
            $quantity = $product->getMinimumQuantity();
        }

        if ($this->checkIfExists($product)) {
            $index = $this->getProductIndex($product);
            $presentQuantity = $this->items[$index]->getQuantity();
            $this->items[$index]->setQuantity($quantity + $presentQuantity);
        } else {
            $this->items[] = (new ItemFactory())->create($product, $quantity);
        }
        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function removeItem(Product $product): self
    {
        if ($this->checkIfExists($product)) {
            $index = $this->getProductIndex($product);
            unset($this->items[$index]);
            $this->items = array_values($this->items);
        }
        return $this;
    }


    /**
     * @return double
     */
    public function getTotalPrice(): float
    {
        for ($i = 0; $i < sizeof($this->items); $i++) {
            $this->totalPrice += $this->items[$i]->getProduct()->getUnitPrice() * $this->items[$i]->getQuantity();
        }
        return $this->totalPrice / 100;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Product $product
     * @return bool
     */
    private function checkIfExists(Product $product): bool
    {
        for ($i = 0; $i < sizeof($this->items); $i++) {
            if ($this->items[$i]->getProduct()->getId() === $product->getId()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Product $product
     * @return int
     * @throws InvalidProductIndexException
     */
    public function getProductIndex(Product $product): int
    {
        for ($i = 0; $i < sizeof($this->items); $i++) {
            if ($this->items[$i]->getProduct()->getId() === $product->getId()) {
                return $i;
            }
        }
        throw new InvalidProductIndexException("Invalid product index supplied.");
    }
}
