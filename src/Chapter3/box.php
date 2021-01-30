<?php

/**
 * Функция поиска ключа в коробке, использующая рекурсию.
 * Время выполнения: O(n!). Функция возвращает: string.
 */
function boxRec(array $box): string
{
    foreach ($box as $item) {
        if ($item !== 'key') {            
            if (is_array($item)) {
                return boxRec($item);
            }
        } else {
            return array_shift($box);
        }
    }
}

$dataBox = [
    'a' => 'key',
    'b' => [
        ['c' => 'key2'],
        ['d' => 'key5']
    ]
];

$dataBox1 = [
    'item',
    'item1',
    ['item' => 'key'],
    'item',
    'item',
    ['item1' => 'key3'],
];

$dataBox2 = [
    'key',
    'item1',
    ['item' => 'key8'],
    'item',
    'item',
    ['item1' => 'key3'],
];

var_dump(boxRec($dataBox));
var_dump(boxRec($dataBox1));
var_dump(boxRec($dataBox2));