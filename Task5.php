<?php

namespace src;

use GMP;
use InvalidArgumentException;

class Task5
{
    public function fib_by_len(int $n): GMP
    {
        $F = [[gmp_init(1), gmp_init(1)], [gmp_init(1), gmp_init(0)]];
        $this->power($F, $n);

        return $F[0][0];
    }

    public function getLargeValue(GMP $num1, GMP $num2, GMP $num3, GMP $num4): GMP
    {
        return gmp_add(gmp_mul($num1, $num2), gmp_mul($num3, $num4));
    }

    public function multiply(array &$F, array $M): void
    {
        $x = $this->getLargeValue($F[0][0], $M[0][0], $F[0][1], $M[1][0]);
        $y = $this->getLargeValue($F[0][0], $M[0][1], $F[0][1], $M[1][1]);
        $z = $this->getLargeValue($F[1][0], $M[0][0], $F[1][1], $M[1][0]);
        $w = $this->getLargeValue($F[1][0], $M[0][1], $F[1][1], $M[1][1]);

        $F[0][0] = $x;
        $F[0][1] = $y;
        $F[1][0] = $z;
        $F[1][1] = $w;
    }

    public function power(array &$F, int $n): void
    {
        $M = [[gmp_init(1), gmp_init(1)], [gmp_init(1), gmp_init(0)]];
        do {
            $this->multiply($F, $M);
            $cur = gmp_strval($F[0][0]);
        } while (strlen($cur) < $n);
    }

    public function main(int $n): GMP
    {
        if ($n > 0) {
            return $n == 1 ? gmp_init(1) : $this->fib_by_len($n);
        } else {
            throw new InvalidArgumentException('Bad input');
        }
    }
}

/*$t = new Task5();
echo $t->main(300);*/
