<?php


namespace DealerGroup\Cart;

use DealerGroup\Entity\Item;
use DealerGroup\Entity\Product;

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
    public function addItem(Product $product, $quantity = null)
    {
        if ($quantity === null) {
            $quantity = $product->getMinimumQuantity();
        }

        if ($this->checkIfExists($product)) {
            $presentQuantity = $this->items[$this->getProductIndex($product)]->getQuantity();
            $this->items[$this->getProductIndex($product)]->setQuantity($quantity + $presentQuantity);
            return $this;
        } else {
            $this->items[] = (new Item($product))->setQuantity($quantity);
            return $this;
        }
    }

    public function removeItem(Product $product)
    {
        if ($this->checkIfExists($product)) {
            unset($this->items[$this->getProductIndex($product)]);
            $this->items[] = array_values($this->items);
        }
        return $this;
    }


    /**
     * @return mixed
     */
    public function getCart()
    {
        for ($i = 0; $i < sizeof($this->items); $i++) {
            intval($this->totalPrice += ($this->items[$i]
                        ->getProduct()
                        ->getUnitPrice() * $this->items[$i]->getQuantity()) / 100);
        }
        return $this->totalPrice;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    private function checkIfExists(Product $product)
    {
        for ($i = 0; $i < sizeof($this->items); $i++) {
            if ($this->items[$i]->getProduct()->getId() === $product->getId()) {
                return true;
            }
        }
        return false;
    }

    public function getProductIndex(Product $product)
    {
        for ($i = 0; $i < sizeof($this->items); $i++) {
            if ($this->items[$i]->getProduct()->getId() === $product->getId()) {
                return $i;
            }
        }
    }
}
