<?php

namespace Test\Farm\Factory\Factories;

use Test\Farm\Entity\Entities\Chicken;
use Test\Farm\Factory\IEntityFactory;

class DefaultChickenFactory implements IEntityFactory
{
    public function createEntity(): Chicken
    {
        return new Chicken();
    }
}