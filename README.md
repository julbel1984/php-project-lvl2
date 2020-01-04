# "Generate diff" by Hexlet

Второй проект в рамках професии PHP-программист на [Хекслет](https://ru.hexlet.io/professions/php)

[![Build Status](https://travis-ci.org/julbel1984/php-project-lvl2.svg?branch=master)](https://travis-ci.org/julbel1984/php-project-lvl2)
[![Maintainability](https://api.codeclimate.com/v1/badges/21a857375482c60a5daa/maintainability)](https://codeclimate.com/github/julbel1984/php-project-lvl2/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/21a857375482c60a5daa/test_coverage)](https://codeclimate.com/github/julbel1984/php-project-lvl2/test_coverage)


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

### Asciinema
[![asciicast](https://asciinema.org/a/bdje8uUqmpCnTnTgd68QFJYLl.svg)](https://asciinema.org/a/bdje8uUqmpCnTnTgd68QFJYLl)