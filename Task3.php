<?php

namespace src;

use Exception;
use InvalidArgumentException;

class Task3
{
    public function main(int $number): int
    {
        try {
            if (func_num_args() == 1 && is_integer($number)) {
                $number_str = (string)$number;
                while (strlen($number_str) > 1) {
                    $value = 0;
                    for ($i = 0; $i < strlen($number_str); $i++) {
                        $value .= $number_str[$i];
                    }
                    $number_str = (string)$value;
                }

                return (int)$number_str;
            } else {
                throw new InvalidArgumentException('Bad input');
            }
        } catch (Exception $ex) {
            throw new InvalidArgumentException('Bad input');
        }
    }
}

$t = new Task3();
//echo $t->main();
echo '<br>';
echo $t->main(111111111111111111111111111111111111111111111111111);
echo '<br>';
echo $t->main(231);
echo '<br>';
echo $t->main('231');
echo '<br>';
echo $t->main(-444);
