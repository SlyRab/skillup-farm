<?php

namespace Test\Farm\Registrar;

use Test\Farm\Entity\Entities\Chicken;
use Test\Farm\Entity\Entities\Cow;
use Test\Farm\Entity\FarmEntity;

class DefaultRegistration implements IRegistrationProccess
{
    public function register(FarmEntity $entity, array $farm): void
    {
        $prefix = match ($entity::class) {
            Cow::class => 'КРВ',
            Chicken::class => 'КРЦ',
            default => 'НЗВСТН',
        };

        $entityArray = array_filter($farm, static function ($value) use ($entity) {
            return $entity::class == $value::class;
        });
        $entityCount = count($entityArray);

        $entity->setId("$prefix-$entityCount");
    }
}