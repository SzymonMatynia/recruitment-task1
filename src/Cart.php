<?php


namespace DealerGroup;

use DealerGroup\Entity\Item;

class Cart
{
    private $cart = [];
    private $totalPrice;

    /**
     * @param Item $item
     * @return $this
     * @throws \Exception
     */
    public function addItem(Item $item, $quantity)
    {
        for ($i = 0; $i < sizeof($this->cart); $i++) {
            if ($this->cart[$i] === $item) {
                $item->changeItemQuantity($item->getQuantity() + $this->cart[$i]->getQuantity());
                return $this;
            }
        }
        $item->setQuantity($quantity);
        $this->cart[] = $item;
        return $this;
    }

    public function removeItem(Item $item)
    {
        for ($i = 0; $i < sizeof($this->cart); $i++) {
            if ($this->cart[$i] === $item) {
                unset($this->cart[$i]);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getCart()
    {
        for ($i = 0; $i < sizeof($this->cart); $i++) {
            $this->totalPrice += $this->cart[$i]->getProduct()->getUnitPrice() * $this->cart[$i]->getQuantity();
        }
        return $this->totalPrice;
    }
}
