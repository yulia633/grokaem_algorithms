<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Chapter5\CheckVoter;

class checkVoterTest extends TestCase
{
    public function addDataProvider()
    {
        return [
            ['tom', 'let them vote'],
            ['mike', 'let them vote'],
            ['mike', 'kick them out'],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testCheckVoter($list1, $expected)
    {
        $obj = new CheckVoter();

        $result = $obj->checkVoter($list1);
        $this->assertEquals($expected, $result);
    }
}
