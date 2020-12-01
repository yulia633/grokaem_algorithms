<?php

/**
 * Алгоритм бинарного поиска с использованием рекурсии.
 * Бинарный поиск работает с отсортированными элементами.
 * Функция получает отсортированный массив, значение и стартовую позицию.
 * Программа выведет индекс искомого элемента или пустой массив, если 
 * элемента в массиве нет.
 * Находим средний элемент изначального массива и сравниваем его с искомым
 * элементом в левой или правой границе массива, рекурсивно сокращая массив,
 * пока не найден искомый элемент или массив не станет пустым.
 * Время выполнения: O(log n). Функция возвращает: [] | float
 */
function binarySearchRecursion(array $array, int $item, $start = 0)
{
    $length = count($array);

    if (empty($array)) {
        return [];
    }

    $end = $length === 1 ? $start : $start + $length;
    //середина области поиска
    $middle = floor(($start + $end) / 2);

    $guess = $array[$middle];

    if ($guess === $item) {
        return $middle;
    } elseif ($guess > $item) {
        $newArray = array_slice($array, 0, $length / 2, true);
        return binarySearchRecursion($newArray, $item, $start);
    } else {
        $newArray = array_slice($array, $length / 2, null, true);
        return binarySearchRecursion($newArray, $item, $middle);
    }

    return null;

}

echo binarySearchRecursion([1, 3, 5, 7, 9], 7); //3
var_dump(binarySearchRecursion([1, 3, 5, 7, 9], -1)); //[]