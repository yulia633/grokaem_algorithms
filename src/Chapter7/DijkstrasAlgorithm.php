<?php

namespace App\Chapter7;

class DijkstrasAlgorithm
{
    public function searchPath(array $graph, array $costs, array $parents)
    {
        $processed = [];
        [$node, $processed] = $this->findLowestCostNode($costs, $processed);
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
            [$node, $processed] = $this->findLowestCostNode($costs, $processed);
        }
        return $costs;
    }

    /*
    Найти узел с наименьшей стоимостью
    **/
    public function findLowestCostNode(array $costs, array $processed)
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
}
