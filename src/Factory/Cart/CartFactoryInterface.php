<?php
declare(strict_types=1);

namespace DealerGroup\Factory\Cart;

use DealerGroup\Model\Cart;

interface CartFactoryInterface
{
    /**
     * @return Cart
     */
    public function create(): Cart;
}
