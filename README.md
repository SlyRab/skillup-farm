# skilup-php
Задание для skillup

Тестирование заданий происходит через cli команду src/Cli/CliTest.php
Внутри команды расписано что за чем идет, для запуска нужно

1. Собрать autoload в композере
2. запустить команду php src/bin/main.php

Структура проекта:

/src/Farm/Entity -- все сущности фермы (Коровы/Курицы)
/src/Farm/Enums -- все перечисления проекта (Перечисление типа продукта)
/src/Farm/Factory/ -- все фабрики проекта (фабрика обычных куриц и обычных коров)
/src/Farm/Products/Product -- ValueObject собранных продуктов
/src/Farm/Registrar/ -- все способы выдачи идентификатора объекту
/Farm/Farm -- основной объект фермы

![изображение](https://user-images.githubusercontent.com/28905785/224992218-75deccc4-0f54-4bd1-90fa-a02372d824a0.png)
