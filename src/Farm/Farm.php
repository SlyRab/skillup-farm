<?php

namespace Test\Farm;

use Test\Farm\Entity\FarmEntity;
use Test\Farm\Enums\ProductType;
use Test\Farm\Registrar\IRegistrationProccess;

class Farm
{
    /**
     * @var array масив сущностей фермы. Должен содержать объекты класса FarmEntity
     */
    private array $farm = [];

    /**
     * @var IRegistrationProccess метод выдачи идентификаторов сущности
     */
    private IRegistrationProccess $registration;

    public function __construct(IRegistrationProccess $registration)
    {
        $this->registration = $registration;
    }

    public function getProducts(): array
    {
        $result = [];

        foreach ($this->farm as $entity)
        {
            $products = $entity->getProducts();
            foreach ($products as $product)
            {
                if (isset($result[$product->type->name])) {
                    $result[$product->type->name] += $product->count;
                } else {
                    $result[$product->type->name] = $product->count;
                };
            }
        }

        return $result;
    }

    /**
     * Метод добавления сущности на ферму
     *
     * @param FarmEntity $entity
     * @return void
     */
    public function addEntity(FarmEntity $entity): void
    {
        $this->registration->register($entity, $this->farm);

        $this->farm[] = $entity;
    }

    /**
     * @return array Подсчёт сущностей на ферме
     */
    public function getEntities(): array
    {
        $result = [];

        foreach ($this->farm as $entity)
        {
            if (isset($result[$entity::ENTITY_NAME])) {
                $result[$entity::ENTITY_NAME] += 1;
            } else {
                $result[$entity::ENTITY_NAME] = 1;
            };
        }

        return $result;
    }
}