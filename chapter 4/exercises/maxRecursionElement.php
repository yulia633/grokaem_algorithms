<?php

/**
 *  Функция находит максимальное значение в массиве,
 *  использует рекурсию. Функция имеет базовый случай,
 *  когда массив пустой и рекурсивный случай. Если массив пустой,
 *  возвращаем null. Иначе рекурсивно уменьшаем исходный массив на
 *  один элемент и сравниваем первый элемент и следующий, если
 *  первый элемент больше следующего, возвращаем первый элемент,
 *  иначе вызываем nextMax.
 *  Возвращает null или int.
 */
 function maxRecursionElement(array $array)
 {
    if (count($array) === 0) {
        return null;
    }

    $nextMax = maxRecursionElement(array_slice($array, 1));
    $head = array_shift($array);

    if ($head > $nextMax) {
        return $head;
    }

    return $nextMax;
 }

 print_r(maxRecursionElement([2, 4, 12, 6, 9]));