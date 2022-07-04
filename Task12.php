<?php

namespace src;

use InvalidArgumentException;

class Calculator
{
    protected float $lhs;
    protected float $rhs;
    protected float $res;

    public function __construct(float $lhs, float $rhs)
    {
        $this->lhs = $lhs;
        $this->rhs = $rhs;
    }

    public function getResult(): float
    {
        return $this->res;
    }

    public function add(): Calculator
    {
        $this->res = $this->lhs + $this->rhs;
        return $this;
    }

    public function sub(): Calculator
    {
        $this->res = $this->lhs - $this->rhs;
        return $this;
    }

    public function multiply(): Calculator
    {
        $this->res = $this->lhs * $this->rhs;
        return $this;
    }

    public function divideBy($divider = 1): Calculator
    {
        if ($divider == 0) {
            throw new InvalidArgumentException('Division by zero');
        }
        $this->res = $this->res / $divider;

        return $this;
    }
}
