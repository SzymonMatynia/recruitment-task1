<?php
declare(strict_types=1);

namespace DealerGroup\Factory\Cart;

use DealerGroup\Model\Cart;

class CartFactory implements CartFactoryInterface
{

    /**
     * @inheritDoc
     */
    public function create(): Cart
    {
        return new Cart();
    }
}
