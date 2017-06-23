<?php

namespace Pluralization\Driver;

use Pluralization\abstractPluralization;

/**
 * Example
 * $params = [
 *      'element',
 *      'elements',
 *      // для десятичных дробей
 *      'element',
 *  ];
 */
class En extends abstractPluralization
{
    const REQUIRED_ROWS = 3;
    /**
     * En constructor.
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
            return $this->params[2];
        }
        if ($this->number == 1) {
            return $this->params[0];
        }
        return $this->params[1];
    }
}