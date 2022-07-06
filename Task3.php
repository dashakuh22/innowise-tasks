<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task3
{

    public static function main(int $number): int
    {
        try {
            if (func_num_args() == 1 && (is_numeric($number) || is_integer($number))) {
                $number_str = (string)abs($number);
                while (strlen($number_str) > 1) {
                    $value = 0;
                    for ($i = 0; $i < strlen($number_str); $i++) {
                        $value += (int)$number_str[$i];
                    }
                    $number_str = (string)$value;
                }

                return (int)$number_str;
            } else {
                throw new InvalidArgumentException('Too many arguments or not integer input');
            }
        } catch (Exception $exception) {
            throw new InvalidArgumentException();
        }
    }
}

//$t = new Task3();
//echo $t->main();
//echo '<br>';
//echo $t->main('-111111111111m1111111');
//echo $t->main(1111111111111111111);
//echo '<br>';
//echo $t->main(231);
//echo '<br>';
//echo $t->main('2h31');
//echo '<br>';
//echo $t->main(-444);
