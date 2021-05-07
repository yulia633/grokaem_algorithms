<?php

namespace App\Chapter9;

class Knapsack
{
    /**
     * Задача на программирование: рюкзак
     * Есть 3 или более предмета, которые можно уложить в рюкзак. Вместимость рюкзака составляет 4 фунта.
     * Магнитофон - $3000, вес - 4 фунта. Ноутбук - $2000, вес - 3 фунта. Гитара - $1500, вес - 1 фунт.
     * Какие предметы следует положить в рюкзак, чтобы стоимость добычи была максимальной?
     */
    public function knapsack($weights, $costs, $sizePack)
    {
        //вычисляем шаг - это минимальный вес товара
        $step = min(...array_values($weights));
        //инициализируем матрицу для поиска максимальной стоимости товара
        $cell = [];

        $things = array_keys($weights);
        foreach ($things as $i => $thing) {
            for ($j = $step; $j <= $sizePack; $j += $step) {
                // предыдущий максимум
                $previousMax = $cell[$i - 1][$j] ?? null;

                if ($weights[$thing] > $j) {
                    if ($previousMax) {
                        $cell[$i][$j] = $previousMax;
                    }
                } else {
                    // стоимость оставшегося пространства
                    $costOfRemainingSpace = $cell[$i - 1][$j - $weights[$thing]] ?? null;
                    // стоимость текущего элемента
                    $costMaxCell = $costs[$thing];
                    // стоимость текущего элемента + стоимость оставшегося пространства =
                    // максимум стоимости ячейки, при условии того, что уже помещен в ячейку элемент
                    if ($costOfRemainingSpace) {
                        $costMaxCell = $costOfRemainingSpace['cost'] + $costs[$thing];
                    }
                    // если предыдущий максимум есть
                    if ($previousMax) {
                         // если ма стоимости ячейки больше стоимости предыдущего элемента
                         // то добавляем вещь
                        if ($costMaxCell > $previousMax['cost']) {
                            $maxThings = $costOfRemainingSpace['things'] ?? null;
                            $maxThings[] = $thing;
                            $cell[$i][$j] = [
                                'cost' => $costMaxCell,
                                'things' => $maxThings,
                                ];
                        } else {
                          // иначе добавляем максимум из предыдущей ячейки
                            $cell[$i][$j] = $previousMax;
                        }
                    } else {
                        $cell[$i][$j] = [
                        'cost' => $costMaxCell,
                        'things' => [$thing],
                        ];
                    }
                }
            }
        }
        // стоимость оставшегося пространства
        $result = $cell[$i][$j - $step];
        return $result;
    }
}
