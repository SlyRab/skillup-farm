<?php

namespace Test\Farm\Products;

use Test\Farm\Enums\ProductType;

class Product
{
    /**
     * Объект собранных продуктов
     *
     * @param ProductType $type
     * @param int $count
     */
    public function __construct(
        public readonly ProductType $type,
        public readonly float $count)
    {
    }
}