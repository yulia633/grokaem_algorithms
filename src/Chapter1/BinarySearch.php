<?php

namespace App\Chapter1;

class BinarySearch
{
    /**
     * Алгоритм бинарного поиска.
     * Бинарный поиск работает с отсортированными элементами.
     * Функция получает отсортированный массив и значение. Если значение
     * присутствует в массиве, то функция возвращает его позицию.
     * Каждый раз алгоритм проверяет средний элемент $middle. Если названное
     * число мало, то $low обновляется: $guess < $item --> $low = $middle + 1,
     * иначе если названное число велико, то обновляется $high
     * Время выполнения: O(log n). Функция возвращает: bool | int
     */
    public function binarySearch(array $arr, int $item, $low = 0)
    {
        $high = count($arr) - 1;

        while ($low <= $high) {
            $middle = (int) floor(($low + $high) / 2);
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
}
