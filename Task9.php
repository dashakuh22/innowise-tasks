<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task9
{
    public function main(array $arr, int $number): array
    {
        try {
            $res = [];
            for ($i = 0; $i < sizeof($arr) - 2; $i++) {
                if ($arr[$i] + $arr[$i + 1] + $arr[$i + 2] === $number) {
                    $res[] = $arr[$i].' + '.$arr[$i + 1].' + '.$arr[$i + 2].' = '.$number;
                }
            }

            return $res;
        } catch (Exception $ex) {
            throw new InvalidArgumentException();
        }
    }
}
