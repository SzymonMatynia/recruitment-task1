<?php


namespace DealerGroup\Entity;

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
    public function addItem(Product $product, int $quantity = null)
    {
        if ($quantity === null) {
            $quantity = $product->getMinimumQuantity();
        }

        if ($this->checkIfExists($product)) {
            $index = $this->getProductIndex($product);
            $presentQuantity = $this->items[$index]->getQuantity();
            $this->items[$index]->setQuantity($quantity + $presentQuantity);
        } else {
            $this->items[] = (new Item($product))->setQuantity($quantity);
        }
        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function removeItem(Product $product)
    {
        if ($this->checkIfExists($product)) {
            $index = $this->getProductIndex($product);
            unset($this->items[$index]);
            $this->items = array_values($this->items);
        }
        return $this;
    }


    /**
     * @return mixed
     */
    public function getTotalPrice()
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
    private function checkIfExists(Product $product)
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
     */
    public function getProductIndex(Product $product)
    {
        for ($i = 0; $i < sizeof($this->items); $i++) {
            if ($this->items[$i]->getProduct()->getId() === $product->getId()) {
                return $i;
            }
        }
    }
}
