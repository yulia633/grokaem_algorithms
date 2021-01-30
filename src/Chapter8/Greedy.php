<?php

namespace App\Chapter8;

class Greedy
{
    public function search(array $stations, \Ds\Set $statesNeeded)
    {
        $finalStations = new \Ds\Set();

        while (!$statesNeeded->isEmpty()) {
            $bestStation = null;
            $statesCovered = new \Ds\Set();

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
}
