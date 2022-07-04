<?php

namespace src;

use InvalidArgumentException;

class Task9
{
    public function arrayHasOnlyInts(array $array): bool
    {
        foreach ($array as $value) {
            if (!is_numeric($value)) {
                return false;
            }
        }

        return true;
    }

    public function main(array $arr, int $number): array
    {
        if (is_array($arr) && is_int($number) && $this->arrayHasOnlyInts($arr)) {
            $res = [];
            for ($i = 0; $i < sizeof($arr) - 2; $i++) {
                if ($arr[$i] + $arr[$i + 1] + $arr[$i + 2] === $number) {
                    $res[] = $arr[$i].' + '.$arr[$i + 1].' + '.$arr[$i + 2].' = '.$number;
                }
            }

            return $res;
        } else {
            throw new InvalidArgumentException('Bad input');
        }
    }
}

/*$t = new Task9();
echo '<pre>';
print_r($t->main([2, 7, 7, 1, 7, '-2', -7, -8, 9, 9, -2], 16));
echo '</pre>';*/
