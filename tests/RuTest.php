<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pluralization\Driver\Ru;

class RuTest extends TestCase
{
    private $params = [
        'яблоко',
        'яблока',
        'яблок',
        // для десятичных дробей
        'яблока',
    ];

    public function testGet()
    {
        $numbers = [
            [0, $this->params[2],],
            [1, $this->params[0],],
            [2, $this->params[1],],
            [1.2, $this->params[3],],
            [10, $this->params[2],],
            [12, $this->params[2],],
            [21, $this->params[0],],
            [22, $this->params[1],],
            ['26', $this->params[2],],
            ['3.6', $this->params[3],],
            ['1243', $this->params[1],],
            [235, $this->params[2],],
        ];
        $ru = new Ru($this->params);
        foreach ($numbers as $item) {
            $this->assertEquals(
                $ru->pluralFull($item[0]),
                $item[0] . ' ' . $item[1]
            );
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidParamsAbove()
    {

        new Ru(['1', '2', '3', '4', '5']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidParamsLess()
    {
        new Ru(['1', '2', '3',]);
    }
}
