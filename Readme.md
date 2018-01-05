Pluralization
=============

Installation
------------

Installation using composer:

```
composer require noroman/pluralization
```

Example
-------
```
<?php
require_once __DIR__ . '/vendor/autoload.php';
use Pluralization\Driver\Ru;
$params = [
    'яблоко',   // 1
    'яблока',   // 2
    'яблок',    // 8
    // для десятичных дробей
    'яблока',   // 12.3
];
$ru = new Ru($params);
echo $number . ' ' . $ru->plural($number);
echo "\n";
echo $ru->pluralFull($number);
echo "\n";
```