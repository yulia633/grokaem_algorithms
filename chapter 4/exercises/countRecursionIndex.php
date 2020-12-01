<?php

/**
 *  Функция подсчитывает индексы в массиве,
 *  использует рекурсию. Функция имеет базовый случай,
 *  когда массив пустой и рекурсивный случай. Если массив пустой,
 *  возвращаем null, иначе каждый раз извлекаем последний элемент
 *  в массиве и подсчитываем сумму измененный массив + 1.
 *  Вовзращает null или int.
 */

function countRecursionIndex(array $array)
{
    if (count($array) === 0) {
        return null;
    } else {
        array_pop($array);
        return 1 + countRecursionIndex($array);
    }
}

print_r(countRecursionIndex([2, 4, 6]));