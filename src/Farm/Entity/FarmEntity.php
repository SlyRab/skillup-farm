<?php

namespace Test\Farm\Entity;

/**
 * Сущность фермы -- животные/поля растений
 */
abstract class FarmEntity
{
    private string $id;

    public const ENTITY_NAME = '';

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array абстрактный метод сбора продуктов.
     * Реализиация должна вернуть массив объектов класса Product,
     * так как одно животное может возвращать разные типы продуктов.
     */
    public abstract function getProducts(): array;
}