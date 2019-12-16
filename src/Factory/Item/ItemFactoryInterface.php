<?php
declare(strict_types=1);

namespace DealerGroup\Factory\Item;

use DealerGroup\Model\Item;

interface ItemFactoryInterface
{
    public function create(): Item;
}
