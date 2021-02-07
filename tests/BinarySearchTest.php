<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Chapter1\BinarySearch;

class BinarySearchTest extends TestCase
{
    public function addDataProvider()
    {
        return [
            [[], 0, false],
            [[], 1, false],
            [[1, 3, 5, 7, 9], -1, false],
            [[1, 3, 5, 7, 9], 7, 3],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testBinarySearch($arr, $actual, $expected)
    {
        $obj = new BinarySearch();

        $result = $obj->binarySearch($arr, $actual);
        $this->assertEquals($expected, $result);
    }
}
