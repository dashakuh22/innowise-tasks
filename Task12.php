<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task12
{
    protected float $lhs;
    protected float $rhs;
    protected float $res;

    public function __construct(float|int $lhs, float|int $rhs)
    {
        try {
            $this->lhs = $lhs;
            $this->rhs = $rhs;
            $this->res = 0;
        } catch (Exception $exception) {
            throw new InvalidArgumentException('Bad parameters');
        }
    }

    public function setRhs(float|int $rhs): void
    {
        $this->rhs = $rhs;
    }

    public function setLhs(float|int $lhs): void
    {
        $this->lhs = $lhs;
    }

    public function add(): Task12
    {
        $this->res = $this->lhs + $this->rhs;

        return $this;
    }

    public function subtract(): Task12
    {
        $this->res = $this->lhs - $this->rhs;

        return $this;
    }

    public function multiply(): Task12
    {
        $this->res = $this->lhs * $this->rhs;

        return $this;
    }

    public function divide(): Task12
    {
        if ($this->rhs == 0) {
            throw new InvalidArgumentException('Division by zero');
        }
        $this->res = $this->lhs / $this->rhs;

        return $this;
    }

    public function addBy(float|int $value): Task12
    {
        $this->res = $this->res + $value;

        return $this;
    }

    public function subtractBy(float|int $value): Task12
    {
        $this->res = $this->res - $value;

        return $this;
    }

    public function multiplyBy(float|int $multiplier): Task12
    {
        $this->res = $this->res * $multiplier;

        return $this;
    }

    public function divideBy(float|int $divider): Task12
    {
        if ($divider == 0) {
            throw new InvalidArgumentException('Division by zero');
        }
        $this->res = $this->res / $divider;

        return $this;
    }

    public function __toString(): string
    {
        return $this->res;
    }
}

//echo '<pre>';
//$t = new Task12('1', '3');
//echo $t->multiply()->divideBy();
//echo '</pre>';
