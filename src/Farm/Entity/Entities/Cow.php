<?php

namespace Test\Farm\Entity\Entities;

use Test\Farm\Entity\FarmEntity;
use Test\Farm\Enums\ProductType;
use Test\Farm\Products\Product;

class Cow extends FarmEntity
{
    public const ENTITY_NAME = 'Корова';

    public function __construct(
        private int $minMilk = 8,
        private int $maxMilk = 12)
    {
    }

    public function getProducts(): array
    {
        $result = [];

        $milkCount = rand($this->minMilk, $this->maxMilk);

        $result[] = new Product(ProductType::Milk, $milkCount);

        return $result;
    }
}