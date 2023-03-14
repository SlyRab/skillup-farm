<?php

namespace Test\Farm\Registrar;

use Test\Farm\Entity\FarmEntity;

interface IRegistrationProccess
{
    /**
     * Вынес метод регистрации животных в отдельный класс, так как могут быть разные реализации выдачи id
     *
     * @param FarmEntity $entity
     * @param array $farm
     *
     * @return void
     */
    public function register(FarmEntity $entity, array $farm): void;
}