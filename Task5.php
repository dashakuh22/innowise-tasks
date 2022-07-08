<?php

namespace src;

use InvalidArgumentException;

class Task5
{
    public int $base = 10;

    public function fib_by_len(int $n): string
    {
        $F = [[0], [1]];
        $this->power($F, $n);

        $count = count($F) - 1;
        $result = sprintf('%d', end($F[$count]));
        for ($i = sizeof($F[$count]) - 2; $i >= 0; --$i) {
            $result .= sprintf('%01d', $F[$count][$i]);
        }

        return $result;
    }

    public function getSum(array $arrA, array $arrB): array
    {
        $carry = 0;
        for ($i = 0; $i < max(sizeof($arrA), sizeof($arrB)) || $carry; ++$i) {
            if ($i == sizeof($arrA)) {
                $arrA[] = 0;
            }
            $arrA[$i] += $carry + ($i < sizeof($arrB) ? $arrB[$i] : 0);
            $carry = $arrA[$i] >= $this->base;
            if ($carry) {
                $arrA[$i] -= $this->base;
            }
        }

        return $arrA;
    }

    public function power(array &$F, int $n): void
    {
        $curLength = 0;
        for ($i = 2; $curLength < $n; $i++) {
            $F[$i] = $this->getSum($F[$i - 1], $F[$i - 2]);
            $curLength = sizeof($F[$i]);
        }
    }

    public function main(int $n): string
    {
        if ($n > 0) {
            return $n == 1 ? 1 : $this->fib_by_len($n);
        } else {
            throw new InvalidArgumentException('Bad input');
        }
    }
}
/*
$t = new Task5();
echo $t->main(4);*/
