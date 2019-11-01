# "Generate diff" by Hexlet

Второй проект в рамках професии PHP-программист на [Хекслет](https://ru.hexlet.io/professions/php)

### Описание проекта

В рамках данного проекта необходимо реализовать утилиту для поиска отличий в конфигурационных файлах.

Возможности утилиты:

    Поддержка разных форматов
    Генерация отчета в виде plain text, pretty и json

Пример использования:

```
$ gendiff --format plain first-config.ini second-config.ini
Setting "common.setting2" deleted.
Setting "common.setting4" added with value "blah blah".
Setting "group1.baz" changed from "bas" to "bars".
Section "group2" deleted.
```