<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Chapter7\DijkstrasAlgorithm;

class DijkstrasAlgorithmTest extends TestCase
{
    public function testSearchPath()
    {
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
        
        $obj = new DijkstrasAlgorithm();

        $actual = $obj->searchPath($graph, $costs, $parents);
        $expected = ['a' => 5, 'b' => 2, 'fin' => 6];
        $this->assertEquals($expected, $actual);
    }
}
