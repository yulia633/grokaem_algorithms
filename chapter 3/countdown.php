<?php

/**
 * Функция для вывода обратного отсчета, использующая рекурсию.
 * Время выполнения: O(n!). Функция возвращает: int.
 */

function countdown(int $number)
{
    echo "{$number}\n";
    if ($number <= 1) {
        return;
    } else {
        countdown($number - 1);
    }
}

echo countdown(10);