<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Ds\Set;

function search(array $stations, $statesNeeded)
{
    $finalStations = new Set();

    while(!$statesNeeded->isEmpty()) {
        $bestStation = null;
        $statesCovered = new Set();

        foreach ($stations as $station => $states) {
            $covered = $statesNeeded->intersect($states);
            if (count($covered) > count($statesCovered)) {
                $bestStation = $station;
                $statesCovered = $covered;
            }
        }

        $statesNeeded = $statesNeeded->diff($statesCovered);
        $finalStations->add($bestStation);
    }

    return $finalStations;
}

$statesNeeded = new Set(['mt', 'wa', 'or', 'id','nv', 'ut', 'ca', 'az']);
$stations = [
    'kone' => new Set(['id', 'nv', 'ut']),
    'ktwo' => new Set(['wa', 'id', 'mt']),
    'kthree' => new Set(['or', 'nv', 'ca']),
    'kfour' => new Set(['nv', 'ut']),
    'kfive' => new Set(['ca', 'az']),
];

var_dump(search($stations, $statesNeeded));
