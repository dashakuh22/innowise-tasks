<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task3
{
    public function main(int $number): int
    {
        try {
            $number_str = (string) $number;
            while (strlen($number_str) > 1) {
                $value = 0;
                for ($i = 0; $i < strlen($number_str); $i++) {
                    $value += $number_str[$i];
                }
                $number_str = (string) $value;
            }

            return (int) $number_str;
        } catch (Exception $ex) {
            throw new InvalidArgumentException();
        }
    }
}
