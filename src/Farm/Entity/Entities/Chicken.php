<?php

namespace Test\Farm\Entity\Entities;

use Test\Farm\Entity\FarmEntity;
use Test\Farm\Enums\ProductType;
use Test\Farm\Products\Product;

class Chicken extends FarmEntity
{
    public const ENTITY_NAME = 'Курица';

    public function __construct(
        private int $minEggs = 0,
        private int $maxEggs = 1)
    {
    }

    public function getProducts(): array
    {
        $result = [];

        $eggCount = rand($this->minEggs, $this->maxEggs);

        $result[] = new Product(ProductType::Egg, $eggCount);

        return $result;
    }
}