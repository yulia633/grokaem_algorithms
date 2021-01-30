<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Chapter6\BreadthFirstSearch;

class BreadthFirstSearchTest extends TestCase
{
    public function testSearch()
    {
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

        $obj = new BreadthFirstSearch();

        $expected = 'tom';
        $actual = $obj->search($graph, 'you', 'mango seller');
        $this->assertEquals($expected, $actual);
        
        $expected = null;
        $actual = $obj->search($graph, 'you', 'product manager');
        $this->assertEquals($expected, $actual);

        $graph['alice']['specialty'] = 'mango seller';
        $expected = 'alice';
        $actual = $obj->search($graph, 'you', 'mango seller');
        $this->assertEquals($expected, $actual);
    }
}
