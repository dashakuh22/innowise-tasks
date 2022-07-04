<?php

namespace src;

use InvalidArgumentException;

class Task9
{
    public function main(array $arr, int $number)
    {
        try {
            $res = [];
            for ($i = 0; $i < sizeof($arr) - 2; $i++) {
                if ($arr[$i] + $arr[$i + 1] + $arr[$i + 2] === $number) {
                    $res[] = $arr[$i].' + '.$arr[$i + 1].' + '.$arr[$i + 2].' = '.$number;
                }
            }

            echo '<pre>';
            print_r($res);
            echo '</pre>';
        } catch (InvalidArgumentException $ex) {
            throw new InvalidArgumentException('Bad input');
        }
    }
}

//$t = new Task9();
//$t->main([2, 7, 7, 1, 8, 2, 7, 8, 7, 9, 0], 16);
