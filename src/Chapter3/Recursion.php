<?php

namespace App\Chapter3;

class Recursion
{
    /**
     *  Функция суммирования элементов в массиве,
     *  использующая рекурсию. Функция имеет базовый случай,
     *  когда массив пустой и рекурсивный случай. Если массив пустой,
     *  возвращаем null, иначе результат равен сумме первого числа
     *  в массиве и суммы остального массива.
     *  Возвращает null или int.
     */
    public function sumRecursionElement(array $array)
    {
        if (count($array) === 0) {
            return null;
        } else {
            $head = array_shift($array);
            return $head + $this->sumRecursionElement($array);
        }
    }

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
    public function maxRecursionElement(array $array)
    {
        if (count($array) === 0) {
            return null;
        }

        $nextMax = $this->maxRecursionElement(array_slice($array, 1));
        $head = array_shift($array);

        if ($head > $nextMax) {
            return $head;
        }
        return $nextMax;
    }

    /**
     *  Функция подсчитывает индексы в массиве,
     *  использует рекурсию. Функция имеет базовый случай,
     *  когда массив пустой и рекурсивный случай. Если массив пустой,
     *  возвращаем null, иначе каждый раз извлекаем последний элемент
     *  в массиве и подсчитываем сумму измененный массив + 1.
     *  Возвращает null или int.
     */
    public function countRecursionIndex(array $array)
    {
        if (count($array) === 0) {
            return null;
        } else {
            array_pop($array);
            return 1 + $this->countRecursionIndex($array);
        }
    }

    /**
     * Алгоритм нахождения факториала числа через рекурсию.
     * Если факториал числа равен 1, то его и вовзращаем:
     * 1 * 1 = 1. Иначе, вызываем рекурсию и умножаем
     * число на само себя: 2 * (2 - 1).
     * Время выполнения: O(n!). Функция возвращает: int.
     */
    public function factorial(int $number)
    {
        if ($number < 1) {
            return false;
        }
        if ($number === 1) {
            return $number;
        } else {
            return $number * $this->factorial($number - 1);
        }
    }

    /**
     * Функция поиска ключа в коробке, использующая рекурсию.
     * Время выполнения: O(n!). Функция возвращает: string.
     */
    public function boxRec(array $box): string
    {
        foreach ($box as $item) {
            if ($item !== 'key') {
                if (is_array($item)) {
                    return $this->boxRec($item);
                }
            } else {
                return array_shift($box);
            }
        }
    }

    /**
     * Алгоритм бинарного поиска с использованием рекурсии.
     * Бинарный поиск работает с отсортированными элементами.
     * Функция получает отсортированный массив, значение и стартовую позицию.
     * Программа выведет индекс искомого элемента или пустой массив, если
     * элемента в массиве нет.
     * Находим средний элемент изначального массива и сравниваем его с искомым
     * элементом в левой или правой границе массива, рекурсивно сокращая массив,
     * пока не найден искомый элемент или массив не станет пустым.
     * Время выполнения: O(log n). Функция возвращает: [] | int
     */
    public function binarySearchRecursion(array $array, int $item, $start = 0)
    {
        $length = count($array);

        if (empty($array)) {
            return [];
        }

        $end = $length === 1 ? $start : $start + $length;
        //середина области поиска
        $middle = (int) floor(($start + $end) / 2);

        $guess = $array[$middle];

        if ($guess === $item) {
            return $middle;
        } elseif ($guess > $item) {
            $newArray = array_slice($array, 0, $length / 2, true);
            return $this->binarySearchRecursion($newArray, $item, $start);
        } else {
            $newArray = array_slice($array, $length / 2, null, true);
            return $this->binarySearchRecursion($newArray, $item, $middle);
        }
        return null;
    }
}
