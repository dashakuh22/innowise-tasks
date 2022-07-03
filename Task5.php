<?php

namespace src;

class Task5
{
    public function fib_by_len($n): int
    {
        $F = [[1, 1], [1, 0]];
        if ($n == 0) {
            return 0;
        }
        $this->power($F, $n - 1);

        return $F[0][0];
    }

    public function multiply(&$F, $M)
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

    public function power(&$F, $n)
    {
        $M = [[1, 1], [1, 0]];
        do {
            $this->multiply($F, $M);
            $cur = number_format($F[0][0], 0, '', '');
            echo 'Cur: '.$cur.'<br>';
        } while (strlen($cur) < $n + 1);
    }

    public function main(int $n): int
    {
        return $this->fib_by_len($n);
    }
}
