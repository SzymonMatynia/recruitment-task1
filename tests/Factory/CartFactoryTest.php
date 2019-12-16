<?php
declare(strict_types=1);

namespace DealerGroup\Tests\Factory;

use DealerGroup\Factory\Cart\CartFactory;
use DealerGroup\Model\Cart;
use PHPUnit\Framework\TestCase;

class CartFactoryTest extends TestCase
{
    public function testInstance()
    {
        $cart = (new CartFactory())->create();
        $this->assertInstanceOf(Cart::class, $cart);
    }
}
