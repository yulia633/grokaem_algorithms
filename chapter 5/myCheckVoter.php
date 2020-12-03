<?php

/**
 * Попытка реализации своего хеш-мапа. Функция isCheck также проверяет
 * есть ли значение в хеш-таблице или нет, если есть, то возвращается отрицательный ответ,
 * если нет, то выдается положительный ответ. Занесение значения в хеш-таблицу
 * осуществляется с помощью функции add.
 */

function getIndex($key)
{
    return crc32($key) % 1000;
}
function getKey($key)
{
    $map = [];
    $index = getIndex($key);
    $map[$index] = $key;   
    return $map;
}

function add(string $value)
{
   $explodedStringValue = explode(" ", $value);   
   $mapHash = [];
   foreach ($explodedStringValue as $item) {
       $mapHash = getKey($value);
       return $mapHash;
   }
}

function isCheck(array $checkListName, $valueName)
{    
    $answer = '';
    foreach($checkListName as $item => $counterName) { 
        foreach ($counterName as $key => $name) {
           //сделать проверку по ключу (который схеширован)
            if (($name !== $valueName)) {
                $answer = "let them vote! \n";
                return $answer;
            } elseif ($name === $valueName) {
                $answer = "kick them out! \n";
                return $answer;
            }       

        }

    }
}


$first[] = add("tom"); 
// print_r($first);
$first[] = add("dan"); 
// print_r($first);
$first[] = add("sam"); 
// print_r($first);
$first[] = add("tom"); 
//print_r($first);


$check = isCheck($first, 'tom'); //kick them out! 
//$check = isCheck($first, 'dan'); //let them vote! 
print_r($check);
