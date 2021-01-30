<?php

/**
 *  Функция суммирования элементов в массиве,
 *  использующая рекурсию. Функция имеет базовый случай,
 *  когда массив пустой и рекурсивный случай. Если массив пустой,
 *  возвращаем null, иначе результат равен сумме первого числа
 *  в массиве и суммы остального массива.
 *  Возвращает null или int.
 */
function sumRecursionElement(array $array)
{
    if (count($array) === 0) {
        return null;
    } else {
        $head = array_shift($array);
        return $head + sumRecursionElement($array);
    }
}

print_r(sumRecursionElement([2, 4, 6]));