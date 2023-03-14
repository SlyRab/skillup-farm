<?php

namespace Test\Farm\Factory\Factories;

use Test\Farm\Entity\Entities\Cow;
use Test\Farm\Factory\IEntityFactory;

class DefaultCowFactory implements IEntityFactory
{
    public function createEntity()
    {
        return new Cow();
    }
}