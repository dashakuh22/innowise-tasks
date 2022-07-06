<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task3
{
    public static function main(int $number): int
    {
        try {
            $number_str = (string)abs($number);
            while (strlen($number_str) > 1) {
                $value = 0;
                for ($i = 0; $i < strlen($number_str); $i++) {
                    $value += (int)$number_str[$i];
                }
                $number_str = (string)$value;
            }

            return (int)$number_str;
        } catch (Exception $exception) {
            throw new InvalidArgumentException();
        }
    }
}

/*$t = new Task3();
//echo $t->main('-111111111111m1111111');
echo $t->main(1111111111111111111);
echo '<br>';
echo $t->main(-231.0);
echo '<br>';
echo $t->main('-231');*/
