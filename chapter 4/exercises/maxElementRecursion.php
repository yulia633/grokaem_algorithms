<?php

/**
 *  Функция находит максимальное значение в массиве,
 *  использует рекурсию. Функция имеет базовый случай,
 *  когда массив пустой и рекурсивный случай. Если массив пустой,
 *  возвращаем null. Иначе рекурсивно уменьшаем исходный массив на
 *  один элемент и сравниваем первый элемент и следующий, если
 *  первый элемент больше следующего, возвращаем первый элемент,
 *  иначе вызываем nextMax.
 *  Вовзращает null или int.
 */

 function maxElementRecursion(array $array)
 {
    if (count($array) === 0) {
        return null;
    }

    $nextMax = maxElementRecursion(array_slice($array, 1));
    $head = array_shift($array);

    if ($head > $nextMax) {
        return $head;
    }

    return $nextMax;
 }

 print_r(maxElementRecursion([2, 4, 12, 6, 9]));