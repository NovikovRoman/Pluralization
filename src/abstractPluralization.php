<?php

namespace Pluralization;

abstract class abstractPluralization implements interfacePluralization
{
    protected $number;
    protected $params;

    public function __construct(array $params, $requiredRows)
    {
        if (!is_array($params) || count($params) != $requiredRows) {
            throw new \InvalidArgumentException(
                '$params should be an array and required number of lines in $params: ' . $requiredRows
            );
        }
        $this->setParams($params);
    }

    public function pluralFull($number)
    {
        $this->setNumber($number);
        return $this->number . ' ' . $this->plural($this->number);
    }

    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = (float)$number == (int)$number ? (int)$number : (float)$number;
        return $this;
    }
}