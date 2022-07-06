<?php

namespace src;

use InvalidArgumentException;

class Task7
{
    public function main(array $arr, int $position): array
    {
        if (-1 < $position && $position < sizeof($arr)) {
            $arr_upd = [];
            unset($arr[$position]);

            foreach ($arr as $el) {
                $arr_upd[] = $el;
            }

            return $arr_upd;
        } else {
            throw new InvalidArgumentException('Bad input.');
        }
    }
}

//$t = new Task7();
//print_r($t->main([1, 2, 'a', 4, 5], 3));
