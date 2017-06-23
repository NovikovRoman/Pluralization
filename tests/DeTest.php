<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pluralization\Driver\De;

class DeTest extends TestCase
{
    private $params = [
        'Apfel',
        'Äpfel',
        // для десятичных дробей
        'Apfel',
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
        $de = new De($this->params);
        foreach ($numbers as $item) {
            $this->assertEquals(
                $de->pluralFull($item[0]),
                $item[0] . ' ' . $item[1]
            );
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidParamsAbove()
    {

        new De(['1', '2', '3', '4',]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidParamsLess()
    {
        new De(['1', '2',]);
    }
}
