<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Chapter9\Knapsack;

class KnapsackTest extends TestCase
{
    public function testKnapsack()
    {
        $obj = new Knapsack();

        $weights = [
            'recorder' => 4,
            'notebook' => 3,
            'guitar' => 1,
            'guitar2' => 1
        ];
        
        $costs = [
            'recorder' => 3000,
            'notebook' => 2000,
            'guitar' => 1500,
            'guitar2' => 1700
        ];

        $sizePack = 4;

        $actual = [
            'cost' => 3700,
            'things' => [
                '0' => 'notebook',
                '1' => 'guitar2',
            ],
        ];
        
        $this->assertEquals($actual, $obj->knapsack($weights, $costs, $sizePack));
    }
}
