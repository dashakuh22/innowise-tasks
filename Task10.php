<?php

namespace src;

use InvalidArgumentException;

class Task10
{
    public function main(int $input): array
    {
        if ($input > 0) {
            $arr = [$input];
            while ($input != 1) {
                if ($input % 2 == 0) {
                    $input /= 2;
                } else {
                    $input *= 3;
                    $input++;
                }
                $arr[] = $input;
            }

            return $arr;
        } else {
            throw new InvalidArgumentException();
        }
    }
}
