<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pluralization\Driver\Fr;

class FrTest extends TestCase
{
    private $params = [
        'apple',
        'apples',
        // для десятичных дробей
        'apple',
    ];

    public function testGet()
    {
        $numbers = [
            [0, $this->params[0],],
            [1, $this->params[0],],
            [2, $this->params[1],],
            [1.2, $this->params[2],],
            [10, $this->params[1],],
            [12, $this->params[1],],
            [21, $this->params[1],],
            [22, $this->params[1],],
            ['26', $this->params[1],],
            ['3.6', $this->params[2],],
            ['1243', $this->params[1],],
            [235, $this->params[1],],
        ];
        $fr = new Fr($this->params);
        foreach ($numbers as $item) {
            $this->assertEquals(
                $fr->pluralFull($item[0]),
                $item[0] . ' ' . $item[1]
            );
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidParamsAbove()
    {

        new Fr(['1', '2', '3', '4',]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidParamsLess()
    {
        new Fr(['1', '2',]);
    }
}
