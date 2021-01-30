<?php

namespace App\Chapter5;

class CheckVoter
{
    /**
     * Функция из книги checkVoter, которая проверяет есть ли значение в хеш-таблице
     * или нет, если есть, то возвращается отрицательный ответ, если нет,
     * то значение заносится в таблицу и выдается положительный ответ.
     */
    public function checkVoter(string $value)
    {
        static $voted = [];
        if (array_key_exists($value, $voted)) {
            return "kick them out";
        } else {
            $voted[$value] = true;
            return "let them vote";
        }    
    }
}
