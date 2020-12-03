<?php

/**
 * Функция из книги checkVoter, которая есть ли значение в хеш-таблице
 * или нет, если есть, то возвращается отрицательный ответ, если нет,
 * то значение заносится в таблицу и выдается положительный ответ.
 */
function checkVoter(string $value)
{
    static $voted = [];
    if (array_key_exists($value, $voted)) {
        return "kick them out \n";
    } else {
        $voted[$value] = true;
        return "let them vote \n";
    }    
}

echo checkVoter('tom');
echo checkVoter('mike');
echo checkVoter('mike');
