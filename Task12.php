<?php

namespace src;

use Exception;
use InvalidArgumentException;

class AdditionalOperation
{
    protected float $res;

    public function __construct(float|int $res)
    {
        $this->res = $res;
    }

    public function addBy(float|int $value): AdditionalOperation
    {
        $this->res = $this->res + $value;

        return $this;
    }

    public function subtractBy(float|int $value): AdditionalOperation
    {
        $this->res = $this->res - $value;

        return $this;
    }

    public function multiplyBy(float|int $multiplier): AdditionalOperation
    {
        $this->res = $this->res * $multiplier;

        return $this;
    }

    public function divideBy(float|int $divider): AdditionalOperation
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

class Task12
{
    protected float $lhs;
    protected float $rhs;

    public function __construct(float|int $lhs, float|int $rhs)
    {
        try {
            $this->lhs = $lhs;
            $this->rhs = $rhs;
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

    public function add(): AdditionalOperation
    {
        return new AdditionalOperation($this->lhs + $this->rhs);
    }

    public function subtract(): AdditionalOperation
    {
        return new AdditionalOperation($this->lhs - $this->rhs);
    }

    public function multiply(): AdditionalOperation
    {
        return new AdditionalOperation($this->lhs * $this->rhs);
    }

    public function divide(): AdditionalOperation
    {
        if ($this->rhs == 0) {
            throw new InvalidArgumentException('Division by zero');
        }

        return new AdditionalOperation($this->lhs / $this->rhs);
    }
}

/*echo '<pre>';
$t = new Task12('1', '0');
echo $t->divide();
echo '</pre>';*/
