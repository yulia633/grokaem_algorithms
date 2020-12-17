<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Ds\Queue;

/**
 * Функция из книги search, реализующая алгоритм поиска в ширину.
 * Работа алгоритма начинается с того, что необходимо создать очередь
 * с именами проверяемых людей. Извлечь из очереди человека и проверить
 * является ли он искомым. При этом необходимо занести проверяемого человека
 * в список проверенных, чтобы не проверить его дважды и не уйти тем самым
 * в бесконечный цикл. Если является искомым, то человек найден, завершаем
 * работу, если нет, то добавляем всех соседей этого человека в очередь.
 * Если очередь пуста, это значит, что в очереди нет искомого человека.
 * Время выполнения: O(V + E), где V - это количество вершин, а E -
 * это количество ребер.
 */
function search(array $graph, string $name, string $specialty)
{
    $searched = [];
    $queue = new Queue();
    $queue->push(...$graph[$name]['person']);

    while (!$queue->isEmpty()) {
        $person = $queue->pop();
        if (!in_array($person, $searched)) {
            if ($graph[$person]['specialty'] === $specialty) {
                return $person;
            } else {
                $queue->push(...$graph[$person]['person']);
                $searched[] = $person;
            }
        }
    }

    return null;
}

$graph = [
    'you' => [
        'specialty' => 'product manager',
        'person' => ['alice', 'bob', 'claire'],
    ],
    'bob' => [
        'specialty' => 'head of department',
        'person' => ['anuj', 'peggi'],
    ],
    'alice' => [
        'specialty' => 'cashier',
        'person' => ['peggi'],
    ],
    'claire' => [
        'specialty' => 'operator',
        'person' => ['tom', 'jonny'],
    ],
    'anuj' => [
        'specialty' => 'computer seller',
        'person' => [],
    ],
    'peggi' => [
        'specialty' => 'manager',
        'person' => [],
    ],
    'tom' => [
        'specialty' => 'mango seller',
        'person' => [],
    ],
    'jonny' => [
        'specialty' => 'car seller',
        'person' => [],
    ],
];

//var_dump(search($graph, 'you', 'mango seller')); // tom

$graph['alice']['specialty'] = 'mango seller';
var_dump(search($graph, 'you', 'mango seller')); // alice
