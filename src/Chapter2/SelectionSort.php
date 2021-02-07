<?php

namespace App\Chapter2;

class SelectionSort
{
    /**
     * Функция нахождения поиска наименьшего элемента в массиве.
     */
    public function findSmallestIndex(array $arr)
    {
        if (count($arr) === 0) {
            return [];
        }
        $smallestNumber = $arr[0];
        $smallestIndex = 0;

        foreach ($arr as $item => $value) {
            if ($value < $smallestNumber) {
                $smallestNumber = $value;
                $smallestIndex = $item;
            }
        }
        return $smallestIndex;
    }

    /**
     *  Алгоритм сортировка выбором.
     *  На каждый элемент массива запускаем функцию с циклом для нахождения наименьшего элемента
     *  и добавляем в отсортированный массив sortedArray, при этом удаляя элемент из общего массива
     *  Время выполнения: O(n x n). Функция возвращает: array.
     */
    public function selectionSort(array $arr)
    {
        $sortedArray = [];
        foreach ($arr as $item) {
            $smallestIndex = $this->findSmallestIndex($arr);
            $sortedArray[] = $arr[$smallestIndex];

            array_splice($arr, $smallestIndex, 1);
        }
        return $sortedArray;
    }
}
