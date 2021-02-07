<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Chapter4\QuickSort;

class QuickSortTest extends TestCase
{
    public function addDataProvider()
    {
        return [
            [[3, 2, 4, 1, 5], [1, 2, 3, 4, 5]],
            [[3, 3, 1, 2, 9, 5, 7], [1, 2, 3, 3, 5, 7, 9]],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testCheckVoter($list1, $expected)
    {
        $obj = new QuickSort();

        $result = $obj->quickSort($list1);
        $this->assertEquals($expected, $result);
    }
}
