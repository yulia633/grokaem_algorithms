<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Chapter3\Recursion;

class RecursionTest extends TestCase
{
    public function testSumRecursionElement()
    {
        $obj = new Recursion();

        $arr1 = [];
        $this->assertNull($obj->sumRecursionElement($arr1));

        $arr2 = [3];
        $this->assertEquals(3, $obj->sumRecursionElement($arr2));
        
        $arr3 = [1, 2, 3, 4, 5];
        $this->assertEquals(15, $obj->sumRecursionElement($arr3));

        $arr4 = [2, 4, 6];
        $this->assertEquals(12, $obj->sumRecursionElement($arr4));
    }
    
    public function testMaxRecursionElement()
    {
        $obj = new Recursion();

        $arr1 = [];
        $this->assertNull($obj->maxRecursionElement($arr1));

        $arr2 = [4];
        $this->assertEquals(4, $obj->maxRecursionElement($arr2));
        
        $arr3 = [6, 6, 1];
        $this->assertEquals(6, $obj->maxRecursionElement($arr3));
        
        $arr4 = [2, 4, 12, 6, 9];
        $this->assertEquals(12, $obj->maxRecursionElement($arr4));
    }

    public function testCountRecursionIndex()
    {
        $obj = new Recursion();

        $arr1 = [];
        $this->assertNull($obj->countRecursionIndex($arr1));
        
        $arr2 = [1, 2, 3];
        $this->assertEquals(3, $obj->countRecursionIndex($arr2));
    }

    public function testFactorial()
    {
        $obj = new Recursion();
        
        $actual1 = 0;
        $this->assertEquals(false, $obj->factorial($actual1));

        $actual2 = 1;
        $this->assertEquals(1, $obj->factorial($actual2));

        $actual3 = 5;
        $this->assertEquals(120, $obj->factorial($actual3));
    }

    public function addDataProvider()
    {
        return [
            [[
                'a' => 'key',
                'b' => [
                    ['c' => 'key2'],
                    ['d' => 'key5']
                ]
            ], 'key'],
            [
                [
                    'item',
                    'item1',
                    ['item' => 'key'],
                    'item',
                    'item',
                    ['item1' => 'key3'],
                ], 'key'
            ],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testBoxRec($list1, $expected)
    {
        $obj = new Recursion();

        $result = $obj->boxRec($list1);
        $this->assertEquals($expected, $result);
    }

    public function testBinarySearchRecursion()
    {
        $obj = new Recursion();
        
        $actual1 = [1, 3, 5, 7, 9];
        $actual2 = 7;
        $this->assertEquals(3, $obj->binarySearchRecursion($actual1, $actual2));

        $actual3 = [1, 3, 5, 7, 9];
        $actual4 = -1;
        $this->assertEquals([], $obj->binarySearchRecursion($actual3, $actual4));
    }
}
