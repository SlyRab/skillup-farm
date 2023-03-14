<?php

use Test\Farm\Factory\Factories\DefaultChickenFactory;
use Test\Farm\Factory\Factories\DefaultCowFactory;
use Test\Farm\Farm;
use Test\Farm\Registrar\DefaultRegistration;

require_once dirname(__DIR__) . '../vendor/autoload.php';

$farm = new Farm(new DefaultRegistration());
$cowFactory = new DefaultCowFactory();
$chickenFactory = new DefaultChickenFactory();

for ($i = 0; $i < 10; $i++) {
    $farm->addEntity($cowFactory->createEntity());
}

for ($i = 0; $i < 20; $i++) {
    $farm->addEntity($chickenFactory->createEntity());
}

getFarmInfo($farm);

echo PHP_EOL;

getProductsAllWeek($farm);

// добавляем одну корову и пять кур
$farm->addEntity($cowFactory->createEntity());
for ($i = 0; $i < 5; $i++) {
    $farm->addEntity($chickenFactory->createEntity());
}

getFarmInfo($farm);

echo PHP_EOL;

getProductsAllWeek($farm);

function getFarmInfo(Farm $farm) {
    $farmInfo = $farm->getEntities();

    echo 'На ферме: ' . PHP_EOL;
    foreach ($farmInfo as $key => $value) {
        $text = match ($key) {
            \Test\Farm\Entity\Entities\Cow::ENTITY_NAME => "$value Коров",
            \Test\Farm\Entity\Entities\Chicken::ENTITY_NAME => "$value Куриц",
            default => "$value $key",
        };

        echo $text . PHP_EOL;
    }
}

function getProductsAllWeek(Farm $farm) {
    for ($i = 0; $i < 7; $i++) {
        $products = $farm->getProducts();

        $day = $i + 1;

        echo "$day день недели, собрано: " . PHP_EOL;

        foreach ($products as $product => $count) {
            $text = match ($product) {
                \Test\Farm\Enums\ProductType::Egg->name => "$count Яиц",
                \Test\Farm\Enums\ProductType::Milk->name => "$count литров молока",
                default => throw new \Exception('Такого типа продуктов не существует'),
            };

            echo $text . PHP_EOL;
        }
        echo PHP_EOL;
    }
}