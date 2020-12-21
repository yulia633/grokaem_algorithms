<?php

function searchPath(array $graph, array $costs, array $parents)
{
    $processed = [];
    [$node, $processed] = findLowestCostNode($costs, $processed);
    
    while ($node !== null) {
        $cost = $costs[$node];
        $neighbors = $graph[$node];
        foreach ($neighbors as $key => $neighbor) {            
            $newCost = $cost + $neighbor;
            if ($newCost < $costs[$key]) {
                $costs[$key] = $newCost;
                $parents[$key] = $node;
            }
        }
        $processed[] = $node;
        [$node, $processed] = findLowestCostNode($costs, $processed);
    }

    return $costs;
}

/*
Найти узел с наименьшей стоимостью
**/
function findLowestCostNode(array $costs, array $processed)
{
    $lowestCost = INF;
    $lowestCostNode = null;

    foreach ($costs as $node => $cost) {
        if ($cost < $lowestCost && !in_array($node, $processed)) {
            $lowestCost = $cost;
            $lowestCostNode = $node;
        }
    }

    return [$lowestCostNode, $processed];
}

$graph = [
    'start' => [
        'a' => 6,
        'b' => 2,
    ],
    'a' => [
        'fin' => 1,
    ],
    'b' => [
        'a' => 3,
        'fin' => 5,
    ],
    'fin' => [],
];

$costs = [
    'a' => 6,
    'b' => 2,
    'fin' => INF,
];

$parents = [
    'a' => 'start',
    'b' => 'start',
    'fin' => null,
];

print_r(searchPath($graph, $costs, $parents));