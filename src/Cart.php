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
    public function addItem(Item $item)
    {
        for ($i = 0; $i < sizeof($this->cart); $i++) {
            if ($this->cart[$i] === $item) {
                $item->changeItemQuantity($item->getQuantity() + $this->cart[$i]->getQuantity());
                return $this;
            }
        }
        $this->cart[] = $item;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart[0];
    }
}
