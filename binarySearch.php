<?php

/**
 * Алгоритм бинарного поиска.
 * Бинарный поиск работает с отсортированными элементами.
 * Время выполнения: O(log n). Функция возвращает: bool | int
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
