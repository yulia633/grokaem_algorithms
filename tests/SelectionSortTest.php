<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Chapter2\SelectionSort;

class SelectionSortTest extends TestCase
{
    public function addDataProvider()
    {
        return [
            [[], []],
            [[5, 2, 7, 8], [2, 5, 7, 8]],
            [[7, 7, 7, 1], [1, 7, 7, 7]],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testSelectionSort($arr1, $expected)
    {
        $obj = new SelectionSort();

        $result = $obj->selectionSort($arr1);
        $this->assertEquals($expected, $result);
    }

    public function testFindSmallestIndex()
    {
        $obj = new SelectionSort();

        $arr1 = [];        
        $this->assertEquals([], $obj->findSmallestIndex($arr1));

        $arr2 = [5, 2, 7, 8];        
        $this->assertEquals(1, $obj->findSmallestIndex($arr2));

        $arr3 = [7, 7, 7, 1];        
        $this->assertEquals(3, $obj->findSmallestIndex($arr3));
    }
}
