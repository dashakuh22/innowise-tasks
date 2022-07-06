<?php

namespace src;

use InvalidArgumentException;

class Task9
{
    public function arrayHasOnlyInts(array $array): bool
    {
        foreach ($array as $value) {
            if (!is_int($value) || $value <= 0) {
                return false;
            }
        }

        return true;
    }

    public function checkInput(array $arr, float|int $num): bool
    {
        if (sizeof($arr) < 3 || !$this->arrayHasOnlyInts($arr)) {
            return false;
        }
        if (!is_int($num) || $num <= 0) {
            return false;
        }

        return true;
    }

    public function main(array $arr, int $number): array
    {
        if ($this->checkInput($arr, $number)) {
            $res = [];
            for ($i = 0; $i < sizeof($arr) - 2; $i++) {
                if ($arr[$i] + $arr[$i + 1] + $arr[$i + 2] === $number) {
                    $res[] = [$arr[$i].' + '.$arr[$i + 1].' + '.$arr[$i + 2].' = '.$number];
                }
            }

            return $res;
        } else {
            throw new InvalidArgumentException('Bad input');
        }
    }
}
/*
$t = new Task9();
echo '<pre>';
print_r($t->main([2, 7, 7, 1, 8, 2, 7, 8, 7], 16));
echo '</pre>';*/
