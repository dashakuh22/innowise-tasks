<?php

namespace src;

use InvalidArgumentException;

class Task12
{
    protected float $lhs;
    protected float $rhs;
    protected float $res;

    public function __construct(float $lhs = 0, float $rhs = 0)
    {
        $this->lhs = $lhs;
        $this->rhs = $rhs;
    }

    public function getResult(): float
    {
        if (isset($this->res)) {
            return $this->res;
        } else {
            throw new InvalidArgumentException('Any operation must to be set');
        }
    }

    public function add(): Task12
    {
        $this->res = $this->lhs + $this->rhs;

        return $this;
    }

    public function sub(): Task12
    {
        $this->res = $this->lhs - $this->rhs;

        return $this;
    }

    public function multiply(): Task12
    {
        $this->res = $this->lhs * $this->rhs;

        return $this;
    }

    public function divideBy($divider = 1): Task12
    {
        if ($divider == 0) {
            throw new InvalidArgumentException('Division by zero');
        }
        $this->res = $this->res / $divider;

        return $this;
    }
}

//$t = new Task12(-6, 6);
//echo $t->getResult();
//echo $t->multiply()->divideBy(-2)->getResult();
