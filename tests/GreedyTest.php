<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Chapter8\Greedy;

class GreedyTest extends TestCase
{
    public function testSearch()
    {
        $statesNeeded = new \Ds\Set(["mt", "wa", "or", "id", "nv", "ut", "са", "az"]);
        $stations = [
            'kone' => new \Ds\Set(["id", "nv", "ut"]),
            'ktwo' => new \Ds\Set(["wa", "id", "mt"]),
            'kthree' => new \Ds\Set(["or", "nv", "са"]),
            'kfour' => new \Ds\Set(["nv", "ut"]),
            'kfive' => new \Ds\Set(["ca", "az"]),
        ];
        
        $obj = new Greedy();
        $expexted1 = new \Ds\Set(['kone', 'ktwo', 'kthree', 'kfive']);
        $expexted2 = new \Ds\Set(['ktwo', 'kthree', 'kfour', 'kfive']);
        $actual = $obj->search($stations, $statesNeeded);
        $this->assertTrue($actual == $expexted1 || $actual == $expexted2);
    }
}
