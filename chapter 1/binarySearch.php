<?php

/**
 * Алгоритм бинарного поиска.
 * Бинарный поиск работает с отсортированными элементами.
 * Функция получает отсортированный массив и значение. Если значение
 * присутствует в массиве, то функция возвращает его позицию. 
 * Каждый раз алгоритм проверяет средний элемент $middle. Если названное
 * число мало, то $low обновляется: $guess < $item --> $low = $middle + 1,
 * иначе если названное число велико, то обновляется $high
 * Время выполнения: O(log n). Функция возвращает: bool | float
 */
function binarySearch(array $arr, int $item)
{
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {

        $middle = floor(($low + $high) / 2);
        $guess = $arr[$middle];

        if ($guess === $item) {
            return $middle;
        }
        if ($guess > $item) {
            $high = $middle - 1;
        } else {
            $low = $middle + 1;
        }
    }

    return false;
}

echo binarySearch([1, 3, 5, 7, 9], 7); //3
var_dump(binarySearch([1, 3, 5, 7, 9], -1)); //false
