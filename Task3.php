<?php

namespace src;

use InvalidArgumentException;

class Task3
{
    public function main(int $number): int
    {
        if (strlen(strval(abs($number))) <= 1 || $number < 0) {
            throw new InvalidArgumentException('Bad input');
        }

        $number_str = (string)$number;
        while (strlen($number_str) > 1) {
            $value = 0;
            for ($i = 0; $i < strlen($number_str); $i++) {
                $value += (int)$number_str[$i];
            }
            $number_str = (string)$value;
        }

        return (int)$number_str;
    }
}
