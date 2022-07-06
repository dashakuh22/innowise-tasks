<?php

namespace src;

use InvalidArgumentException;

class Task5
{
    public function fib_by_len($n): float
    {
        $F = [[1, 1], [1, 0]];
        $this->power($F, $n);

        return $F[0][0];
    }

    public function multiply(&$F, $M): void
    {
        $x = $F[0][0] * $M[0][0] +
             $F[0][1] * $M[1][0];
        $y = $F[0][0] * $M[0][1] +
             $F[0][1] * $M[1][1];
        $z = $F[1][0] * $M[0][0] +
             $F[1][1] * $M[1][0];
        $w = $F[1][0] * $M[0][1] +
             $F[1][1] * $M[1][1];

        $F[0][0] = $x;
        $F[0][1] = $y;
        $F[1][0] = $z;
        $F[1][1] = $w;
    }

    public function power(&$F, $n): void
    {
        $M = [[1, 1], [1, 0]];
        do {
            $this->multiply($F, $M);
            $cur = number_format($F[0][0], 0, '', '');
//            echo 'Cur: '.$cur.'<br>';
        } while (strlen($cur) < $n);
    }

    public function main(int $n): float
    {
        if ($n > 0) {
            return $n == 1 ? 1 : $this->fib_by_len($n);
        } else {
            throw new InvalidArgumentException();
        }
    }
}

