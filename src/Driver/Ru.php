<?php

namespace Pluralization\Driver;

use Pluralization\abstractPluralization;

/**
 * Example
 * $params = [
 *      'элемент',
 *      'элемента',
 *      'элементов',
 *      // для десятичных дробей
 *      'элемента',
 *  ];
 */
class Ru extends abstractPluralization
{
    const REQUIRED_ROWS = 4;
    /**
     * Ru constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        parent::__construct($params, self::REQUIRED_ROWS);
    }

    /**
     * @param $number
     * @return string
     */
    public function plural($number)
    {
        $this->setNumber($number);
        if (is_float($this->number)) {
            return $this->params[3];
        }
        if ($this->number > 10 && $this->number < 15) {
            return $this->params[2];
        }
        $end = substr((string)$this->number, -1);
        if ($end == 1) {
            return $this->params[0];
        }
        if ($end > 1 && $end < 5) {
            return $this->params[1];
        }
        return $this->params[2];
    }
}